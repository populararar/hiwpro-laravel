<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\UsersRepository;
use App\Models\OrderHeader;

class ReturnPaymentController extends Controller
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    private $orderHeader;

      public function __construct(OrderHeader $orderHeader,UsersRepository $usersRepo, OrderDetailRepository $orderDetailRepo, OrderHeaderRepository $orderHeaderRepo)
    {
        $this->orderHeaderRepository = $orderHeaderRepo;
        $this->orderDetailRepository = $orderDetailRepo;
        $this->usersRepository = $usersRepo;
        $this->orderHeader = $orderHeader;
    }

    /**
     * Display a listing of the EventJoined.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $orderHeaders = $this->orderHeaderRepository->findWhere(['status'=>'NOPREPARED']);

        $orderHeaders = $this->orderHeader
        // ->Where('seller_id', $user_id)
            ->whereRaw('total_price != seller_actual_price  and status = ?', ['ACCEPTED'])
            ->orderBy('updated_at', 'desc')->get();

        foreach( $orderHeaders as $orderHeader ){
            $users = $this->usersRepository->findWhere(['id' => $orderHeader->customer_id]);
        }
        // dd( $users);
      
        return view('return_payment.index')
        ->with('orderHeaders',$orderHeaders)
        ->with('users',$users);
    }

}
