<table class="table table-responsive" id="orderHeaders-table">
    <thead>
        <tr>
        <th>No.</th>
        <th>Customer Id</th>
        <th>Order Date</th>
        <th>Address</th>
        
        <th>Exp Date</th>
        <th>Slip Status</th>
        <th>Total Price</th>
        <th>Tracking Number</th>
       
        
        {{-- <th>Shipping Id</th> --}}
        {{-- <th>Shipping Date</th>
        <th>Payment Date</th>
        <th>Accepted Date</th> --}}
        <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orderHeaders as $orderHeader)
        <tr>
            <td>{!! $orderHeader->order_number !!}</td> 
            <td>{!! $orderHeader->customer->name !!}</td>
            <td>{!! $orderHeader->order_date !!}</td>
            <td>{!! $orderHeader->address !!}</td>
            
            <td>{!! $orderHeader->exp_date !!}</td>
            <td>{!! $orderHeader->slip_status !!}</td>
            <td style="text-align:center;">{!!number_format($orderHeader->total_price) !!} บาท</td>
            <td>{!! $orderHeader->tracking_number !!}</td>
          
           
            {{-- <td>{!! $orderHeader->shipping_id !!}</td>
            <td>{!! $orderHeader->shipping_date !!}</td>
            <td>{!! $orderHeader->payment_date !!}</td>
            <td>{!! $orderHeader->accepted_date !!}</td> --}}
            <td>{!! $orderHeader->status !!}</td>
            <td>
                {!! Form::open(['route' => ['orderHeaders.destroy', $orderHeader->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orderHeaders.show', [$orderHeader->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orderHeaders.edit', [$orderHeader->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
    $('#orderHeaders-table').DataTable();
    } );
    </script>
@endsection
