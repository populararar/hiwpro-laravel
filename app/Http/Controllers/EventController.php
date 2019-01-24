<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Models\OrderHeader;
use App\Repositories\EventRepository;
use Flash;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventController extends AppBaseController
{
    /** @var  EventRepository */
    private $eventRepository;

    private $lava;

    private $event;

    private $orderDetail;

    private $orderHeader;

    public function __construct(OrderHeader $orderHeader, EventRepository $eventRepo, Lavacharts $lava, Event $event, OrderDetail $orderDetail)
    {
        $this->eventRepository = $eventRepo;
        $this->lava = $lava;
        $this->event = $event;
        $this->orderDetail = $orderDetail;
        $this->orderHeader = $orderHeader;
    }

    /**
     * Display a listing of the Event.
     *
     * @param Request $request
     * @return Response
     */
    public function dashboard(Request $request)
    {
        $this->eventRepository->pushCriteria(new RequestCriteria($request));
        $events = $this->eventRepository->all();
        $events = $events->sortByDesc('event_id');

        $this->setOrderChart($this->lava);

        $this->setPopulationChart($this->lava);

        $countSeller = \DB::table('users_roles')->where('role_id', '2')->count('id');

        $stats = [
            'countA' => $countSeller,
            'countB' => 10,
        ];

        return view('events.dashboard')
            ->with('events', $events)
            ->with('stats', $stats)
            ->with('lava', $this->lava);
    }

    public function index(Request $request)
    {
        $this->eventRepository->pushCriteria(new RequestCriteria($request));
        $events = $this->eventRepository->all();
        $events = $events->sortByDesc('event_id');

        $this->setOrderChart($this->lava);

        $this->setPopulationChart($this->lava);

        $countSeller = \DB::table('users_roles')->where('role_id', '2')->count('id');

        $stats = [
            'countA' => $countSeller,
            'countB' => 10,
        ];

        return view('events.index')
            ->with('events', $events);
    }

    private function setOrderChart($lava)
    {
        $orders = $lava->DataTable();

        $orders->addStringColumn('Year-Month')
            ->addNumberColumn('fail')
            ->addNumberColumn('success');

        $data = $this->getCountOrder();
        foreach ($data as $row) {
            $arr = $row->toArray();
            $countFail = $arr["count"];
            $countSuccess = $arr["countSuccess"];

            $yearMouth = sprintf("%d-%02d", $arr["YEAR(created_at)"], $arr["MONTH(created_at)"]);
            
            $orders->addRow([$yearMouth, $countFail, $countSuccess]);
        }

        $lava->ColumnChart('Orders', $orders, [
            'title' => 'Order counter',
            // 'titleTextStyle' => [
            //     'color'    => '#eb6b2c',
            //     'fontSize' => 12
            // ]
        ]);

    }

    private function setPopulationChart($lava)
    {
        $population = $lava->DataTable();

        $population->addStringColumn('Year-Month')
            ->addNumberColumn('Number of value');

        $data = $this->getTotal();
        foreach ($data as $row) {
            $a = $row->toArray();
            $b = sprintf("%d-%02d", $a["YEAR(created_at)"], $a["MONTH(created_at)"]);
            $population->addRow([$b, $a["income"]]);
        }

        $lava->AreaChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in',
            ],
        ]);

    }

    private function getTotal()
    {
        $data = $this->event
            ->selectRaw("YEAR(created_at) , MONTH(created_at) , SUM(income) AS income")
            ->groupBy("YEAR(created_at)")->groupBy("MONTH(created_at)")
            ->get();

        foreach ($data as $row) {
            $detail = $this->orderDetail
                ->selectRaw("YEAR(created_at) , MONTH(created_at) , SUM(fee) AS fee")
                ->whereRaw("YEAR(created_at) = ? and MONTH(created_at) = ?", [$row['YEAR(created_at)'], $row['MONTH(created_at)']])
                ->groupBy("YEAR(created_at)")->groupBy("MONTH(created_at)")
                ->first();
            if (empty($detail)) {
                continue;
            }
            $row->income = (int) $row->income + (int) $detail->fee;
        }

        return $data;
    }

    private function getCountOrder()
    {

        $data = $this->orderHeader->selectRaw('YEAR(created_at) , MONTH(created_at) , count(id) AS count')
            ->where('status', 'CREATE')
            ->orWhere('status', 'CONFIRMED')
            ->groupBy("YEAR(created_at)")
            ->groupBy("MONTH(created_at)")
            ->get();

        // dd($data);

        foreach ($data as $row) {
            $a = $row->toArray();
            $success = $this->orderHeader->selectRaw('count(id) AS count')
                ->whereRaw('YEAR(created_at) = ? and MONTH(created_at) = ? and status = ?', [$a['YEAR(created_at)'], $a['MONTH(created_at)'], 'COMPLETED'])
                ->first();

            $row->countSuccess = (int) $success->count;
        }

        return $data;

    }

    /**
     * Show the form for creating a new Event.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param CreateEventRequest $request
     *
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $path = $request->file('imgPath')->store('public/upload');

        $input = $request->all();

        $input["imgPath"] = str_replace("public", "", $path);

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Display the specified Event.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }
        //dd($event);

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     *
     * @param  int              $id
     * @param UpdateEventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventRequest $request)
    {

        $newPath = '';
        if ($request->hasFile('imgPathUpdate')) {
            $newPath = $request->file('imgPathUpdate')->store('public/upload');
        }

        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $input = $request->all();
        if ($newPath != '') {
            $input['imgPath'] = str_replace("public", "", $newPath);
        }

        $event = $this->eventRepository->update($input, $id);

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
}
