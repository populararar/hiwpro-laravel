<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEventShopRequest;
use App\Http\Requests\UpdateEventShopRequest;
use App\Repositories\EventRepository;
use App\Repositories\EventShopRepository;
use App\Repositories\ShopRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventShopController extends AppBaseController
{
    /** @var  EventShopRepository */
    private $eventShopRepository;

    /** @var  EventRepository */
    private $eventRepository;

    /** @var  ShopRepository */
    private $shopRepository;

    public function __construct(EventShopRepository $eventShopRepo, ShopRepository $shopRepository, EventRepository $eventRepo)
    {
        $this->eventShopRepository = $eventShopRepo;
        $this->shopRepository = $shopRepository;
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the EventShop.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventShopRepository->pushCriteria(new RequestCriteria($request));
        $eventShops = $this->eventShopRepository->all();
        $eventShops = $eventShops->sortByDesc('id');

        // // TODO : query event_shop by event
        // $shops = $this->shopRepository->all();
        //

        return view('event_shops.index')
        //
        ->with('eventShops', $eventShops);
    }

    public function getShop($event_id, Request $request)
    {
        $joined = $this->eventShopRepository->with(['shop'])->findWhere([['event_id', '=', $event_id]], ['shop_id']);

        // TODO get joined Ids
        $ids = [];
        foreach ($joined as $shop) {
            array_push($ids, $shop->shop_id);
        }

        // where not in table shop
        $shops = $this->shopRepository->with(['location'])->findWhereNotIn('shop_id', $ids);
        // dd($shops);
        return response()->json($shops);
    }

    /**
     * Show the form for creating a new EventShop.
     *
     * @return Response
     */
    public function create()
    {
        // TODO : event_endDate > date_now
        $dateNow = Carbon::now()->setTimezone('Asia/Bangkok')->format('Y-m-d 23:59:59');
        $events = $this->eventRepository->findWhere([['event_exp', '>', $dateNow]]);

        $events = $events->mapWithKeys(function ($item) {
            return [$item['event_id'] => $item['eventName']];
        });

        return view('event_shops.create')
            ->with('events', $events);
    }

    /**
     * Store a newly created EventShop in storage.
     *
     * @param CreateEventShopRequest $request
     *
     * @return Response
     */
    public function store(CreateEventShopRequest $request)
    {
        $input = $request->all();

        $eventShop = $this->eventShopRepository->create($input);

        Flash::success('Event Shop saved successfully.');

        return redirect(route('eventshops.index'));
    }

    /**
     * Display the specified EventShop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventShop = $this->eventShopRepository->findWithoutFail($id);

        if (empty($eventShop)) {
            Flash::error('Event Shop not found');

            return redirect(route('eventshops.index'));
        }

        return view('event_shops.show')->with('eventShop', $eventShop);
    }

    /**
     * Show the form for editing the specified EventShop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventShop = $this->eventShopRepository->findWithoutFail($id);

        if (empty($eventShop)) {
            Flash::error('Event Shop not found');

            return redirect(route('eventshops.index'));
        }


        // $dateNow = Carbon::now()->format('Y-m-d 23:59:59');
        // $events = $this->eventRepository->findWhere([['event_exp', '>', $dateNow]]);

        $events = $this->eventRepository->all();

        $events = $events->mapWithKeys(function ($item) {
            return [$item['event_id'] => $item['eventName']];
        });

        return view('event_shops.edit')->with('eventShop', $eventShop)->with('events', $events);;
    }

    /**
     * Update the specified EventShop in storage.
     *
     * @param  int              $id
     * @param UpdateEventShopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventShopRequest $request)
    {
        $eventShop = $this->eventShopRepository->findWithoutFail($id);

        if (empty($eventShop)) {
            Flash::error('Event Shop not found');

            return redirect(route('eventshops.index'));
        }

        $eventShop = $this->eventShopRepository->update($request->all(), $id);

        Flash::success('Event Shop updated successfully.');

        return redirect(route('eventshops.index'));
    }

    /**
     * Remove the specified EventShop from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventShop = $this->eventShopRepository->findWithoutFail($id);

        if (empty($eventShop)) {
            Flash::error('Event Shop not found');

            return redirect(route('eventshops.index'));
        }

        $this->eventShopRepository->delete($id);

        Flash::success('Event Shop deleted successfully.');

        return redirect(route('eventshops.index'));
    }
}
