<table class="table table-responsive" id="shops-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Detail</th>
        <th>Location Location Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shops as $shop)
        <tr>
            <td>{!! $shop->name !!}</td>
            <td>{!! $shop->detail !!}</td>
            <td>{!! $shop->location->location_name !!}</td>
            <td>
                {!! Form::open(['route' => ['shops.destroy', $shop->shop_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('shops.show', [$shop->shop_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.create', ['shop_id'=>$shop->shop_id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-plus-sign"></i></a>
                    <a href="{!! route('shops.edit', [$shop->shop_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>