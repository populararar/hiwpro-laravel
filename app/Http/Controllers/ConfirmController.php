<?php

namespace App\Http\Controllers;

use App\Repositories\OrderHeaderRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Response;

class ConfirmController extends Controller
{
    //

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    public function __construct(OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->usersRepository = $usersRepo;
    }

    public function index(Request $request)
    {

        if (!$this->validCart()) {
            return redirect()->route('home');
        }

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

            $cart = \Cart::getContent();
            $shopGroup = $cart->groupBy('attributes.key');

            return view('confirms.store')
                ->with('mapSeller', $mapSeller)
                ->with('shopGroup', $shopGroup)
                ->with('cart', $cart);
        }

        return redirect()->route('cart.detail');
    }

    /**
     * Display a listing of the OrderHeader.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        //Event shop id | Seller Id
        $sellers = $request->input('seller');
        $mapSeller = [];
        foreach ($sellers as $s) {
            $arr = explode('-', $s);
            $eventShopId = $arr[0];
            $sellerId = $arr[1];
            // Query seller data
            $mapSeller[$eventShopId] = $this->usersRepository->findWithoutFail($sellerId);
        }

        $cart = \Cart::getContent();
        $shopGroup = $cart->groupBy('attributes.key');

        $request->session()->put('sellers', $sellers);

        return view('confirms.store')
            ->with('mapSeller', $mapSeller)
            ->with('shopGroup', $shopGroup)
            ->with('cart', $cart);
    }

    public function edit($confirm, Request $request)
    {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        // member address get display

        return view('confirms.address'); //->with('memberAddress', []);
    }

    public function final(Request $request)
    {
        if (!$this->validCart()) {
            return redirect()->route('home');
        }

        $address = $request->all();
        // dd($address);
        $sellers = $request->session()->get('sellers');
        $mapSeller = [];
        foreach ($sellers as $s) {
            $arr = explode('-', $s);
            $eventShopId = $arr[0];
            $sellerId = $arr[1];
            // Query seller data
            $mapSeller[$eventShopId] = $this->usersRepository->findWithoutFail($sellerId);
        }

        $cart = \Cart::getContent();
        $shopGroup = $cart->groupBy('attributes.key');

        $request->session()->put('address', $address);

        return view('confirms.final')
            ->with('mapSeller', $mapSeller)
            ->with('shopGroup', $shopGroup)
            ->with('cart', $cart)
            ->with('address', $address);

        // return view('confirm.final')
    }

    private function validCart()
    {
        $cart = \Cart::getContent();
        return count($cart) > 0 ? true : false;
    }

}
