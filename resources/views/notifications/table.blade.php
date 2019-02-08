<div class="weapper" >

 
<table class="table table-hover " id="notifications-table">
    <thead>
        <tr>
        <th>Order Id</th>
        <th>User Id</th>
        <th>Title</th>
        <th>Order</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notifications as $notification)
@php
  $status =  $notification->status;
        $read="";
@endphp
        @if ($status == 1)
            <tr class="table-danger">@php $read = "ยังไม่อ่าน"; @endphp           
        @else
        <tr>@php $read = "อ่านแล้ว"; @endphp 

        @endif
     
            <td><a href="{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}" >
            {!! $notification->orderHeader->order_number !!}</a></td>
            <td>{!! $notification->order_id !!}</td>
            <td>{!! $notification->user_id !!}</td>
            <td>{!! $notification->title !!}</td>
            
            <td > <p >{{ $read}}</p></td>
            
                
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
</div>

@section('scripts')
    <script>
    $(document).ready( function () {
    $('#notifications-table').DataTable();
} );
    </script>
@endsection