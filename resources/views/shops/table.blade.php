<table class="table table-responsive" id="shops-table">
    <thead>
        <tr>
            <th>Name</th>
            <th style="width:50%;">Detail</th>
            <th>Location Location Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shops as $shop)
        <tr>
            <td>{!! $shop->name !!}</td>
            <td >{!! $shop->detail !!}</td>
            <td>{!! $shop->location->location_name !!}</td>
            <td>
                {!! Form::open(['route' => ['shops.destroy', $shop->shop_id], 'method' => 'delete']) !!}
                <div class="btn-group">
                    <a href="{!! route('shops.show', [$shop->shop_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('products.build', ['shop_id'=>$shop->shop_id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-plus"></i></a>
                    <a href="{!! route('shops.edit', [$shop->shop_id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
    // In your Javascript (external .js resource or <script> tag)
    // $(document).ready(function() {
    //     $('#robots').select2();
    // });
    $(document).ready( function () {
    $('#shops-table').DataTable();
    } );
    </script>
@endsection
