<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Repositories\EventJoinedRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\PermissionsRepository;
use App\Repositories\ProducteventRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRolesRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Prettus\Repository\Criteria\RequestCriteria;
use Validator;

class HomeController extends Controller
{

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfileRepository $profileRepo, EventJoinedRepository $eventJoinedRepo, UserRolesRepository $userRolesRepo, ProductRepository $productRepo, ProducteventRepository $producteventRepo, EventShopRepository $eventShopRepo, EventRepository $eventRepo
        , UsersRepository $usersRepo, PermissionsRepository $permissionRepo) {
        $this->eventJoinedRepository = $eventJoinedRepo;
        $this->usersRepository = $usersRepo;
        $this->permissionRepository = $permissionRepo;
        $this->eventRepository = $eventRepo;
        $this->eventShopRepository = $eventShopRepo;
        $this->producteventRepository = $producteventRepo;
        $this->productRepository = $productRepo;
        $this->userRolesRepository = $userRolesRepo;
        $this->profileRepository = $profileRepo;
    }

    public function mail()
    {
        Mail::to('ker13530018@gmail.com')->send(new OrderShipped());
    }

    public function cartRemove($id, Request $request){
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
        // $id = $req->id ;
        // $name = $req->name;
        // $quantity = $req->quantity;
        // $cost = $req->cost;
        // $image = $req->image;

        // Cart::add(array('id' => $id,
        //                 'name' => $name,
        //                 'qty' => $quantity,
        //                 'price' => $cost,
        //                 'image' => $image));

        // $cart = Cart::content();

        $cart = \Cart::getContent();
        $shopGroup = $cart->groupBy('attributes.key')->sort();

        $shopGroup = $shopGroup->map(function ($item, $key) {
            // Get saller in event shop
            $eventShopId = $item->first()->attributes->event_shop_id;
            $item->sellers = $this->getSallerInEventShop($eventShopId);
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

            return view('cart')
                ->with('cart', $cart)
                ->with('mapSeller', $mapSeller)
                ->with('shopGroup', $shopGroup);
        }
        // $request->session()->put('_cart', $cart);

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

        dd($updatelog, $request->session()->get('_cart'));

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
        return view('cart2')->with('cart', $cart);
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

        foreach ($events as $event) {
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
        }
        $events = $events->sortByDesc('last_date');

        return view('home')->with('events', $events);
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
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:18',
            'password_confirmation' => 'required|same:password|min:6|max:18',
            // 'national_id' => 'required|min:13|max:13',
            // 'img_id1' => 'required',
            // 'img_id2' => 'required',
        ]);

        $input = $request->all();
        // $path = $input->file('img_id1')->store('public/upload');
        // $path2 = $input->file('img_id2')->store('public/upload');
        
       

        // $input["image_product_id"] = str_replace("public", "", $path);
        // $input["img_product"] = str_replace("public", "", $path2);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        // $profile = [
        //     // 'tel' => $
        //     // 'img' => "",
        //     // 'address_id' => $
        //     // 'bank_num' => $input['bank_name'],
        //     // 'bank_name' => $input['password'],
        //     'national_id' => $input['national_id'],
        //     'national_img' => $input['img_id1'],
        //     'national_img2' => $input['img_id2'],
        //     'user_id' => $user->id,
        //     'status',
        // ];
        
        // $profileInput = $this->profileRepository->create($profile);

        $user = $this->usersRepository->create($input);

        if (empty($user)) {
            return redirect()->route('register')
                ->withErrors(['error' => 'register fail'])
                ->withInput();
        }

        $role = $input['role'];

        $role = $this->userRolesRepository->create([
            'user_id' => $user->id,
            'role_id' => $role,
            'status' => '1',
        ]);

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

            if ($user->usersRoles->first()->role->name == 'ADMIN') {
                return redirect()->route('dashboards.index');
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
