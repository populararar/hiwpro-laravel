<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Repositories\NotificationRepository;
use App\Repositories\OrderHeaderRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Carbon\DateTimeZone;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NotificationController extends AppBaseController
{
    /** @var  OrderHeaderRepository */
    private $orderHeaderRepository;

    /** @var  UsersRepository */
    private $usersRepository;

    /** @var  NotificationRepository */
    private $notificationRepository;

    public function __construct(OrderHeaderRepository $orderHeaderRepo, UsersRepository $usersRepo, NotificationRepository $notificationRepo)
    {
        $this->notificationRepository = $notificationRepo;
        $this->usersRepository = $usersRepo;
        $this->orderHeaderRepository = $orderHeaderRepo;
    }

    /**
     * Display a listing of the Notification.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    { 
        
        $this->notificationRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        $now = Carbon::now()->setTimezone('Asia/Bangkok');
        $orderHeaders = $this->orderHeaderRepository->findWhere(['customer_id' => $user->id]);

        $user = Auth::user();
        
        $notifications = $this->notificationRepository->findWhere(['user_id' => $user->id])->sortByDesc('created_at')->sortBy('status');

        $user = $this->usersRepository->findwhere(['id' => $notifications->orderHeader->seller_id])->sortByDesc('created_at')->sortBy('status');
        // dd( $user );
        return view('notifications.index')
            ->with('orderHeaders', $orderHeaders)
            ->with('notifications', $notifications);
    }

    /**
     * Show the form for creating a new Notification.
     *
     * @return Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created Notification in storage.
     *
     * @param CreateNotificationRequest $request
     *
     * @return Response
     */
    public function store(CreateNotificationRequest $request)
    {
        $input = $request->all();

        $notification = $this->notificationRepository->create($input);

        Flash::success('Notification saved successfully.');

        return redirect(route('notifications.index'));
    }

    /**
     * Display the specified Notification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            Flash::error('Notification not found');

            return redirect(route('notifications.index'));
        }

        $user = Auth::user();
        if ($notification->user_id != $user->id) {
            Flash::error('Notification not found');

            return redirect(route('notifications.index'));
        }

        $this->notificationRepository->update(['status' => 1], $notification->id);

        return view('notifications.show')->with('notification', $notification);
    }

    /**
     * Show the form for editing the specified Notification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            Flash::error('Notification not found');

            return redirect(route('notifications.index'));
        }

        return view('notifications.edit')->with('notification', $notification);
    }

    public function read($id, Request $request)
    {
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            Flash::error('Notification not found');

            return response()->json([]);
        }

        $notification = $this->notificationRepository->update(['status' => 0], $id);

        Flash::success('Notification updated successfully.');

        return response()->json([]);
    }

    /**
     * Update the specified Notification in storage.
     *
     * @param  int              $id
     * @param UpdateNotificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotificationRequest $request)
    {
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            Flash::error('Notification not found');

            return redirect(route('notifications.index'));
        }

        $notification = $this->notificationRepository->update($request->all(), $id);

        Flash::success('Notification updated successfully.');

        return redirect(route('notifications.index'));
    }

    /**
     * Remove the specified Notification from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notification = $this->notificationRepository->findWithoutFail($id);

        if (empty($notification)) {
            Flash::error('Notification not found');

            return redirect(route('notifications.index'));
        }

        $this->notificationRepository->delete($id);

        Flash::success('Notification deleted successfully.');

        return redirect(route('notifications.index'));
    }
}
