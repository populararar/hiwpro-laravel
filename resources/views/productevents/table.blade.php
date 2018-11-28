<table class="table table-responsive" id="productevents-table">
    <thead>
        <tr>
            <th>Sale Price</th>
            <th>Event Shop Id</th>
            <th>Event Shop name</th>
            <th>Promotion Id</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productevents as $productevent)
        <tr>
            <td>{!! $productevent->sale_price !!}</td>
            <td>{!! $productevent->event_shop_id !!}</td>
            <td>{!! $productevent->eventshop->event->eventName !!}</td>
            <td>{!! $productevent->promotion_id !!}</td>
            <td>{!! $productevent->product_id !!}</td>
            <td>{!! $productevent->product->name !!}</td>
            <td>
                {!! Form::open(['route' => ['productevents.destroy', $productevent->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productevents.show', [$productevent->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productevents.edit', [$productevent->id]) !!}" class='btn btn-default btn-xs'><i
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