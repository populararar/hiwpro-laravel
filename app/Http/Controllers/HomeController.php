<?php

namespace App\Http\Controllers;

use App\Models\SellerReview;
use App\Repositories\EventJoinedRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PermissionsRepository;
use App\Repositories\ProducteventRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\SellerReviewRepository;
use App\Repositories\UserRolesRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Validator;

class HomeController extends Controller
{
    /** @var  SellerReviewRepository */
    private $sellerReviewRepository;

    /** @var  NotificationRepository */
    private $notificationRepository;

    /** @var  ProfileRepository */
    private $profileRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  UsersRepository */
    private $permissionRepository;

    /** @var  EventRepository */
    private $eventRepository;

    /** @var  EventShopRepository */
    private $eventShopRepository;

    /** @var  ProducteventRepository */
    private $producteventRepository;

    /** @var  ProductRepository */
    private $productRepository;

    /** @var  UserRolesRepository */
    private $userRolesRepository;

    /** @var  EventJoinedRepository */
    private $eventJoinedRepository;

    private $sellerReview;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SellerReviewRepository $sellerReviewRepo, NotificationRepository $notificationRepo, ProfileRepository $profileRepo, EventJoinedRepository $eventJoinedRepo, UserRolesRepository $userRolesRepo, ProductRepository $productRepo, ProducteventRepository $producteventRepo, EventShopRepository $eventShopRepo, EventRepository $eventRepo
        , UsersRepository $usersRepo, PermissionsRepository $permissionRepo
        , SellerReview $sellerReview
    ) {
        $this->sellerReview = $sellerReview;
        $this->eventJoinedRepository = $eventJoinedRepo;
        $this->usersRepository = $usersRepo;
        $this->permissionRepository = $permissionRepo;
        $this->eventRepository = $eventRepo;
        $this->eventShopRepository = $eventShopRepo;
        $this->producteventRepository = $producteventRepo;
        $this->productRepository = $productRepo;
        $this->userRolesRepository = $userRolesRepo;
        $this->profileRepository = $profileRepo;
        $this->notificationRepository = $notificationRepo;
        $this->sellerReviewRepository = $sellerReviewRepo;
    }

    public function searchEvent(Request $request)
    {
        $now = Carbon::now()->setTimezone('Asia/Bangkok')->toDateTimeString();
        $key = $request->input('q');
        $events = $this->eventRepository->findWhere([
            ['eventName', 'like', '%' . $key . '%'],
            ['startDate', '<=', $now],
            ['lastDate', '>=', $now],
        ]);

        $eventShops = [];
        if (count($events) > 0) {
            foreach ($events as $event) {
                $event->start_date = $this->formatEventDate($event->startDate);
                $event->last_date = $this->formatEventDate($event->lastDate);
                foreach ($event->eventShops as $eventShop) {
                    array_push($eventShops, $eventShop->id);
                }
            }
        }

        // $users = DB::table('users')->paginate(15);

        $productEvents = $this->producteventRepository->findWhereIn('event_shop_id', $eventShops);

        // dd($events, $eventShops, $productEvents);
        return view('home.search')
            ->with('events', $events)
            ->with('eventShops', $eventShops)
            ->with('productEvents', $productEvents);
    }

    public function sellerReviewDetail($userId, Request $request)
    {
        $reviews = $this->sellerReviewRepository->findWhere(['user_id' => $userId]);

        $avgData = $this->sellerReview->with('seller')
            ->selectRaw('user_id , AVG(score) AS avg_score')
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->orderBy('avg_score', 'desc')
            ->first();

        $profile = $this->profileRepository->findWhere(['user_id' => $userId])->first();

        foreach ($reviews as $review) {
            $review->customer = $this->profileRepository->findWhere(['user_id' => $review->customer_id ])->first();
            $review->user = $this->usersRepository->findWithoutFail($review->customer_id);
            // dd($review->customer , $review->user);
        }
        // dd($reviews, $avgData, $avgData->seller->name);
        return view('home.seller_detail')
            ->with('profile', $profile)
            ->with('avgData', $avgData)
            ->with('reviews', $reviews);

    }

    public function sellerReview(Request $request)
    {

        // $profile = $this->profileRepository->all();
        $user = Auth::user();

        $reviews = $this->sellerReviewRepository->all();

        $reviewsTopTen = $this->sellerReview->with('seller')
            ->selectRaw('user_id , AVG(score) AS avg_score')
        //->where('user_id', $userId)
            ->groupBy('user_id')
            ->orderBy('avg_score', 'desc')
            ->limit(10)->get();
        // ->first()

        foreach ($reviewsTopTen as $item) {
            $item->count = $this->sellerReviewRepository->findWhere(['user_id' => $item->user_id])->count();
        }

        $reviewsTopFour = $this->sellerReview->with('seller')->selectRaw('user_id , AVG(score) AS avg_score')
            ->groupBy('user_id')
            ->orderBy('avg_score', 'desc')
            ->limit(4)->get();

        $newSeller = $this->userRolesRepository->with('user')->findWhere(['role_id' => 2])->sortByDesc('created_at')->take(2);
        foreach ($newSeller as $item) {
            $item->profile = $this->profileRepository->findWhere(['user_id' => $item->user_id]);
        }
        // $newSellerProfile = $this->profileRepository->findWhere(['user_id' => $newSeller->user_id]);
        // dd($newSeller->first());
        // dd($newSeller->first()->user->name, $reviewsTopTen);

        return view('home.seller_rate')
            ->with('user', $user)
            ->with('newSeller', $newSeller)
            ->with('reviewsTopFour', $reviewsTopFour)
            ->with('reviewsTopTen', $reviewsTopTen);
        // ->with('user_id',$user_id)
        // ->with('profile', $profile);
    }

    public function cartRemove($id, Request $request)
    {
        \Cart::remove($id);
        return redirect()->route('cart.detail');
    }

    public function increase($id, Request $request)
    {
        // dd( );
        $quantity = \Cart::get($id)->quantity;

        \Cart::update($id, array(
            'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));

        $cart = \Cart::getContent();
        return response()->json(['cart' => $cart]);
    }

    public function decrease($id, Request $request)
    {
        $item = \Cart::get($id);
        if (empty($item)) {
            $cart = \Cart::getContent();
            return response()->json(['cart' => $cart]);
        }
        $quantity = $item->quantity;
        if ($quantity == 1) {
            \Cart::remove($id);
        } else {
            \Cart::update($id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));
        }

        $cart = \Cart::getContent();
        return response()->json(['cart' => $cart]);
    }

    public function cartDetail(Request $request)
    {
        $cart = \Cart::getContent();

        $shopGroup = $cart->groupBy('attributes.key')->sort();

        // dd($shopGroup);
        $shopGroup = $shopGroup->map(function ($item, $key) {
            // Get saller in event shop
            $eventShopId = $item->first()->attributes->event_shop_id;
            $item->sellers = $this->getSallerInEventShop($eventShopId);

            // $profile =  $this->profileRepository->findWhere(['user_id' => $item->sellers->user_id ]);
            return $item;
        });

        if ($request->session()->has('sellers')) {
            $sellers = $request->session()->get('sellers');

            $mapSeller = [];
            foreach ($sellers as $s) {
                $arr = explode('-', $s);
                $eventShopId = $arr[0];
                $sellerId = $arr[1];
                // Query seller data
                $mapSeller[$eventShopId] = $this->usersRepository->findWithoutFail($sellerId);
            }
            // dd($mapSeller);
            return view('cart')
                ->with('cart', $cart)
                ->with('mapSeller', $mapSeller)
                ->with('shopGroup', $shopGroup);
            // ->with('profile', $profile)
        }
        // dd($request->session()->get('sellers'));

        return view('cart')->with('cart', $cart)->with('shopGroup', $shopGroup);
    }

    public function order(Request $request)
    {
        dd($request->all());
    }

    /**
     * addSeller
     *
     * @param  mixed $eventShopId
     * @param  mixed $sellerId
     *
     * @return void
     */
    public function addSeller($eventShopId, $sellerId, Request $request)
    {
        // dd($request->session()->get('_cart'));

        $cart = $request->session()->get('_cart');
        $updatelog = [];
        foreach ($cart as $item) {
            if ($eventShopId == $item->attributes->event_shop_id) {
                $free = $item->attributes->get('fee');
                $event_shop_id = $item->attributes->get('event_shop_id');
                $shippping = $item->attributes->get('shippping');
                $image_product_id = $item->attributes->get('image_product_id');
                $key = $item->attributes->get('key');
                array_push($updatelog, $item->id);
                $attributes = [
                    'free' => $free,
                    'key' => $key,
                    'update' => true,
                    'event_shop_id' => $event_shop_id,
                    'shippping' => $shippping,
                    'image_product_id' => $image_product_id,
                    'seller_id' => $sellerId,
                ];

                $item->attributes = $attributes;
            }
        }

        $request->session()->put('_cart', $cart);

        // dd($updatelog, $request->session()->get('_cart'));

        return response()->json(['cart' => $cart]);
    }

    /**
     *getSallerInEventShop Do query get saller by event shop id
     *
     * @param  mixed $eventShopId
     *
     * @return Array
     */
    private function getSallerInEventShop($eventShopId)
    {
        $eventJoineds = $this->eventJoinedRepository->with('seller')->findWhere(['event_shop_id' => $eventShopId]);
        $sellers = $eventJoineds->map(function ($eventJoin) {
            $sellerId = $eventJoin->seller->id;
            $reviews = $this->sellerReviewRepository->findWhere(['user_id' => $sellerId]);
            $avg = $reviews->avg('score');
            if (empty($avg)) {
                $avg = 0;
            }
            $eventJoin->seller->avg = $avg;
            $eventJoin->seller->tag = 'normal';
            return $eventJoin->seller;
        });
        $newbie = $this->getSallerInEventShopNewbie($eventShopId);
        foreach ($newbie as $item) {
            $sellers->push($item);
        }

        $pro = $this->getSallerInEventShopPro($eventShopId);
        foreach ($pro as $item) {
            $sellers->push($item);
        }

        // dd($sellers, $pro);
        // $normal = $sellers->filter(function($item){
        //     return $item->tag =="normal";
        // });

        // $newbie = $sellers->filter(function($item){
        //     return $item->tag =="newbie";
        // });
        // dd($newbie);

        return $sellers;
    }

    private function getSallerInEventShopPro($eventShopId)
    {
        $eventJoineds = $this->eventJoinedRepository->with('seller')->findWhere(['event_shop_id' => $eventShopId]);
        $sellers = $eventJoineds->map(function ($eventJoin) {

            $sellerId = $eventJoin->seller->id;
            $reviews = $this->sellerReviewRepository->findWhere(['user_id' => $sellerId]);
            $avg = $reviews->avg('score');
            if (empty($avg)) {
                $avg = 0;
            }
            $eventJoin->seller->avg = $avg;
            $eventJoin->seller->tag = 'pro';
            return $eventJoin->seller;
        });

        $sellers = $sellers->sortByDesc('avg')->take(2);
        return $sellers;
    }

    private function getSallerInEventShopNewbie($eventShopId)
    {
        $newSeller = $this->userRolesRepository->with('user')->findWhere(['role_id' => 2])->sortByDesc('created_at')->take(15);
        $newbieId = [];
        foreach ($newSeller as $seller) {
            array_push($newbieId, $seller->user_id);
        }

        $eventJoineds = $this->eventJoinedRepository->with('seller')->findWhere(['event_shop_id' => $eventShopId]);
        if (count($newbieId) < 1) {
            $eventJoineds = $eventJoineds->sortByDesc('seller_seller_id')->take(10);
        } else {
            $eventJoineds = $eventJoineds->whereIn('seller_seller_id', $newbieId)->take(10);
        }

        $sellers = $eventJoineds->map(function ($eventJoin) {

            $sellerId = $eventJoin->seller->id;
            $reviews = $this->sellerReviewRepository->findWhere(['user_id' => $sellerId]);
            $avg = $reviews->avg('score');
            if (empty($avg)) {
                $avg = 0;
            }
            $eventJoin->seller->avg = $avg;
            $eventJoin->seller->tag = 'newbie';
            return $eventJoin->seller;
        });

        return $sellers;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventinfo()
    {
        $now = Carbon::now()->toDateTimeString();
        $events = $this->eventRepository->findWhere([['event_exp', '>', $now]]);

        foreach ($events as $event) {
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
        }

        // $users = App\User::paginate(15);

        return view('eventinfo')->with('events', $events);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventdetail($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);
        $eventShop = $this->eventShopRepository->findWithoutFail([['event_id', '=', $id]]);
        $product = $this->productRepository->findWhere([['product_id', '=', $id]])->first();

        //SELECT id FROM hiwpro.event_shop where event_id = 21
        $eventShops = $this->eventShopRepository->findWhere([['event_id', '=', $event->event_id]]);
        $eventShopIds = [];
        foreach ($eventShops as $eventshop) {
            $id = $eventshop->id;
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
            array_push($eventShopIds, $id);
        }
        //SELECT * FROM hiwpro.product_event where event_shop_id in ();
        $productEvents = $this->producteventRepository->findWhereIn('event_shop_id', $eventShopIds);

        // dd($productEvents);

        return view('eventdetail')->with('event', $event)->with('productEvents', $productEvents);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventproduct($event_shop_id, $id)
    {
        // dd($id);
        $eventShop = $this->eventShopRepository->findWithoutFail($event_shop_id);

        $product = $this->productRepository->findWhere([['product_id', '=', $id]])->first();
        // dd($product);

        return view('eventproduct')->with('product', $product)->with('eventShop', $eventShop);

    }

    public function cartAdd(Request $request)
    {
        $input = $request->all();

        $product = $this->productRepository->findWithoutFail($input['product_id']);

        $eventShop = $this->eventShopRepository->findWithoutFail($input['event_shop_id']);

        $item = [
            'id' => $product->product_id,
            // 'event' => $eventShop->event_id->event_name,
            'name' => $product->name,
            'price' => $product->price,

            'quantity' => $input['quantity'],
            'attributes' => [
                "key" => trim($eventShop->event->eventName . ' ' . $eventShop->shop->name, " "),
                "fee" => $input['fee'],
                "event_shop_id" => $input['event_shop_id'],
                "shippping" => $input['shippping'],
                'image_product_id' => $product->image_product_id,
            ],
        ];

        \Cart::add($item);

        Flash::success('Add to cart successfully.');

        // dd($input, \Cart::getContent());
        return redirect()->route('event.detail', ['id' => $eventShop->event_id]);
    }

    public function cartFlush()
    {
        \Cart::clear();

        // \Cart::remove($id);
        // $cart =  \Cart::getContent();  ->with('cart',$cart)

        return redirect()->route('cart.add');
    }

    public function cartSeller()
    {

        $cart = \Cart::getContent();
        return view('cart')->with('cart', $cart);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventorder()
    {
        return view('order');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->toDateTimeString();
        $events = $this->eventRepository->findWhere([['event_exp', '>', $now]]);
        $event_now = $this->eventRepository->findWhere([['startDate', '>=', $now]])->first();

        // dd($event_now);
        $profile = $this->profileRepository->all();

        foreach ($events as $event) {
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
        }

        $event_now->start_date = $this->formatEventDate($event_now->startDate);
        $event_now->last_date = $this->formatEventDate($event_now->lastDate);

        $events = $events->sortByDesc('last_date');

        if (Auth::check()) {
            $user = Auth::user();
            $notify = $this->notificationRepository->findWhere(['user_id' => $user->id, 'status' => 0]);

            if (!empty($notify)) {
                session()->put('notify', count($notify));
            } else {
                session()->put('notify', 0);
            }
        }

        return view('home')
            ->with('profile', $profile)
            ->with('events', $events)
            ->with('event_now', $event_now);
    }

    private function formatEventDate($dateTime)
    {
        return Carbon::parse($dateTime)->format('d M Y');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    private function getPermissions()
    {
        $user = Auth::user();
        // dd($user->usersRoles);
        $role_id = $user->usersRoles->first()->role_id;
        if (!empty($role_id)) {
            $permissions = $this->permissionRepository->with(['menu'])->findWhere([
                'role_id' => $role_id,
            ]);

            $permissions = $permissions->sortBy('sort');
            session(['permissions' => $permissions]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $input = $request->all();
        $role = $input['role'];
        // $user = Auth::user();
        if ($role == 3) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'role' => 'required',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6|max:18',
                'password_confirmation' => 'required|same:password|min:6|max:18',
                'img_pro' => 'required',
                'tel_add' => 'required',
            ]);

        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'role' => 'required',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|min:6|max:18',
                'password_confirmation' => 'required|same:password|min:6|max:18',
                'national_id' => 'required|max:13',
                'bank_account' => 'required',
                'bank_num' => 'required|max:10',
                'bank_name' => 'required',
                'img_pro' => 'required',
                'img_id1' => 'required',
                'img_id2' => 'required',
                'tel_add' => 'required',

            ]);
        }

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        if ($role == 2) {

            $path = $request->file('img_pro')->store('public/upload');
            $path2 = $request->file('img_id1')->store('public/upload');
            $path3 = $request->file('img_id2')->store('public/upload');

            $input["img"] = str_replace("public", "", $path);
            $input["national_img"] = str_replace("public", "", $path2);
            $input["national_img2"] = str_replace("public", "", $path3);
        }
        if ($role == 3) {

            $path = $request->file('img_pro')->store('public/upload');

            $input["img"] = str_replace("public", "", $path);

        }

        $input['password'] = bcrypt($input['password']);

        $user = $this->usersRepository->create($input);

        if (empty($user)) {
            return redirect()->route('register')
                ->withErrors(['error' => 'register fail'])
                ->withInput();
        }

        $role = $this->userRolesRepository->create([
            'user_id' => $user->id,
            'role_id' => $role,
            'status' => '1',
        ]);

        if (empty($input['bank_num'])) {
            $profile = [
                'tel' => $input['tel_add'],
                'img' => $input['img'],
                // 'address_id' => $
                // 'bank_num' => $input['bank_num'],
                // 'bank_name' => $input['bank_name'],
                // 'national_id' => $input['national_id'],
                // 'national_img' => $input['national_img'],
                // 'national_img2' => $input['national_img2'],
                'user_id' => $user->id,
                'status' => 1,
            ];
        } else {
            $profile = [
                'tel' => $input['tel_add'],
                'img' => $input['img'],
                // 'address_id' => $
                'bank_account' => $input['bank_account'],
                'bank_num' => $input['bank_num'],
                'bank_name' => $input['bank_name'],
                'national_id' => $input['national_id'],
                'national_img' => $input['national_img'],
                'national_img2' => $input['national_img2'],
                'user_id' => $user->id,
                'status' => 1,
            ];
        }

        $profileInput = $this->profileRepository->create($profile);

        Flash::success('Register saved successfully.');

        return redirect()->route('login.index');
    }
    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $user = $this->usersRepository->findWhere([
            'email' => $email,
        ])->first();

        $checked = Hash::check($password, $user['password']);
        if (isset($user) && $checked) {
            Auth::login($user);
            // get role permission
            $this->getPermissions();

            if ($request->session()->has('back.fullUrl')) {
                $fullUrl = $request->session()->pull('back.fullUrl');
                return redirect($fullUrl);
            }

            if ($user->usersRoles->first()->role->name == 'ADMIN') {
                return redirect()->route('reportAdmins.index');
            }

            if ($user->usersRoles->first()->role->name == 'SELLER') {
                return redirect()->route('eventJoineds.index');
            }

            if ($user->usersRoles->first()->role->name == 'USER') {
                return redirect()->route('home');
            }

            return redirect()->route('home');
        }

        return view('auth.login', compact('email'))
            ->withErrors(['email' => 'username or password invalid']);
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if (Auth::check()) {
            session()->forget('permissions');
            $request->session()->flush();
            $request->session()->regenerate();
            Auth::logout();
        }
        return redirect()->route('home');
    }

}
