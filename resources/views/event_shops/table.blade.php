<table class="table table-responsive" id="eventShops-table">
    <thead>
        <tr>
            <th>Event Id</th>
            <th style="width:40%;">Event name</th>
            <th>Shop Id</th>
            <th>Shop name</th>
            <th colspan="4">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventShops as $eventShop)
        <tr>
            <td>{!! $eventShop->event_id !!}</td>
            <td>{!! $eventShop->event->eventName !!}</td>
            <td>{!! $eventShop->shop_id !!}</td>
            <td>{!! $eventShop->shop->name .' - '.$eventShop->shop->location->branch !!}</td>
            <td>
                {!! Form::open(['route' => ['eventshops.destroy', $eventShop->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventshops.show', [$eventShop->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('productevents.index.event', ['event_shop_id' => $eventShop->id]) !!}" class='btn btn-primary btn-defalt btn-xs'><i
                            class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="{!! route('eventshops.edit', [$eventShop->id]) !!}" class='btn btn-warning btn-xs'><i
                            class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn
                    btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>