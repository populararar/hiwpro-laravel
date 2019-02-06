<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEventJoinedRequest;
use App\Http\Requests\UpdateEventJoinedRequest;
use App\Repositories\EventJoinedRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\ShopRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventJoinedController extends AppBaseController
{
    /** @var  EventShopRepository */
    private $eventShopRepository;

    /** @var  EventJoinedRepository */
    private $eventJoinedRepository;

    /** @var  EventRepository */
    private $eventRepository;

    public function __construct(EventJoinedRepository $eventJoinedRepo, EventRepository $eventRepo, EventShopRepository $eventShopRepo, ShopRepository $shopRepository)
    {
        $this->eventJoinedRepository = $eventJoinedRepo;
        $this->eventRepository = $eventRepo;
        $this->eventShopRepository = $eventShopRepo;
    }

    /**
     * Display a listing of the EventJoined.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->eventJoinedRepository->pushCriteria(new RequestCriteria($request));
        // $eventJoineds = $this->eventJoinedRepository->all();

        $now = Carbon::now()->toDateTimeString();

        $this->eventRepository->pushCriteria(new RequestCriteria($request));
        $events = $this->eventRepository->findWhere([['event_exp', '>', $now]]);
        //select * from table where id > 1 and id < 3;

        return view('event_joineds.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new EventJoined.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_joineds.create');
    }

    /**
     * Store a newly created EventJoined in storage.
     *
     * @param CreateEventJoinedRequest $request
     *
     * @return Response
     */
    public function store(CreateEventJoinedRequest $request)
    {
        $input = $request->all();

        $eventJoined = $this->eventJoinedRepository->create($input);

        Flash::success('Event Joined saved successfully.');

        return redirect(route('eventJoineds.index'));
    }

    /**
     * Display the specified EventJoined.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);
        $eventShops = $this->eventShopRepository->findWhere(['event_id' => $id]);

        $now = Carbon::now()->toDateTimeString();
        
        $events = $this->eventRepository->findWhere([['event_exp', '>', $now]]);

        foreach ($events as $event) {
            $event->start_date = $this->formatEventDate($event->startDate);
            $event->last_date = $this->formatEventDate($event->lastDate);
        }

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('eventJoineds.index'));
        }

        return view('event_joineds.show')->with('events', $events)->with('event', $event)->with('eventShops', $eventShops);
    }

    /**
     * Show the form for editing the specified EventJoined.
     *
     * @param  int $id
     *
     * @return Response
     */
    //   /eventJoined/1/edit => /eventJoined/index

    public function edit($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('eventJoineds.index'));
        }

        $user = Auth::user();

        $eventShops = $this->eventShopRepository->findWhere(['event_id' => $id]);

        $eventJoined = $this->eventJoinedRepository->findWhere(['seller_seller_id' => $user->id]);

        foreach ($eventShops as $es) {
            $has = $eventJoined->where('event_shop_id', $es->id)->first();
            if (!empty($has)) {
                $es->joined = true;
                $es->joined_id = $has->id;
            } else {
                $es->joined = false;
            }
        }

       $count = $eventShops->where('joined', false)->count();
       $countUnjoin = $eventShops->where('joined', true)->count();

        // dd($eventShops);

        return view('event_joineds.edit')
            ->with('event', $event)
            ->with('count', $count)
            ->with('countUnjoin', $countUnjoin)
            ->with('eventJoined', $eventJoined)
            ->with('eventShops', $eventShops);
    }

    /**
     * Update the specified EventJoined in storage.
     *
     * @param  int              $id
     * @param UpdateEventJoinedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventJoinedRequest $request)
    {
        // dd($id, $request->all());
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('eventJoineds.index'));
        }

        $user = Auth::user();

        $eventShop_ids = $request->input("shop_id");
        foreach ($eventShop_ids as $eventShop_id) {
            $this->eventJoinedRepository->create([
                'seller_seller_id' => $user->id,
                'event_shop_id' => $eventShop_id,
            ]);
        }

        Flash::success('Event Joined updated successfully.');

        return redirect(route('eventJoineds.index'));
    }

    /**
     * Remove the specified EventJoined from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // dd($id);
        $eventJoined = $this->eventJoinedRepository->findWithoutFail($id);

        if (empty($eventJoined)) {
            Flash::error('Event Joined not found');

            return redirect(route('eventJoineds.index'));
        }

        $this->eventJoinedRepository->delete($id);

        Flash::success('Event Joined deleted successfully.');

        return redirect(route('eventJoineds.index'));
    }
}
