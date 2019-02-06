<table class="table table-responsive" id="notifications-table">
    <thead>
        <tr>
            <th>Order Id</th>
        <th>User Id</th>
        <th>Title</th>
        <th>Order</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notifications as $notification)
        <tr>
            <td>{!! $notification->order_id !!}</td>
            <td>{!! $notification->user_id !!}</td>
            <td>{!! $notification->title !!}</td>
            <td><a href="{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}" class="btn btn-info">
            {!! $notification->orderHeader->order_number !!}</a></td>
            <td>{!! $notification->status !!}</td>
            <td>
                {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notifications.show', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{-- <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>