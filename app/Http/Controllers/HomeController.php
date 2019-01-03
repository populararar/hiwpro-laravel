<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\PermissionsRepository;
use App\Repositories\ProducteventRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;

class HomeController extends Controller
{

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepo, ProducteventRepository $producteventRepo, EventShopRepository $eventShopRepo, EventRepository $eventRepo, UsersRepository $usersRepo, PermissionsRepository $permissionRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->permissionRepository = $permissionRepo;
        $this->eventRepository = $eventRepo;
        $this->eventShopRepository = $eventShopRepo;
        $this->producteventRepository = $producteventRepo;
        $this->productRepository = $productRepo;
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

        //SELECT id FROM hiwpro.event_shop where event_id = 21
        $eventShops = $this->eventShopRepository->findWhere([['event_id', '=', $event->event_id]]);
        $eventShopIds = [];
        foreach ($eventShops as $eventshop) {
            $id = $eventshop->id;
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
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $input['quantity'],
            'attributes' => [
                "fee" => $input['fee'],
                "event_shop_id" => $input['event_shop_id'],
                "shippping" => $input['shippping'],
            ],
        ];
        \Cart::add($item);

        Flash::success('Add to cart successfully.');
        // dd($input, \Cart::getContent());
        return redirect()->route('event.detail', ['id' => $eventShop->event_id]);
    }

    public function cartDetail()
    {
        dd(\Cart::getContent());
    }

    public function cartFlush()
    {
        \Cart::clear();
        return redirect()->route('home');
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
                return redirect()->route('events.index');
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
    public function destroy(Request $requst)
    {
        if (Auth::check()) {
            session()->forget('permissions');
            Auth::logout();
        }
        return redirect()->route('home');
    }

}
