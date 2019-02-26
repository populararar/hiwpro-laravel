{{-- @php
  $num = $orderHeader->total_price;
  $formattedNum = number_format($num);  
@endphp --}}

<table class="table table-responsive" id="orderHeaders-table">
    <thead>
        <tr>
        <th>Order No.</th>
        <th>Customer Id</th>
        <th>Address</th>
        <th>Order Date</th>
        {{-- <th>Exp Date</th> --}}
        {{-- <th>Slip Status</th> --}}
        <th>Total Price</th>
        <th>Tracking Number</th>
       
        
        {{-- <th>Shipping Id</th>
        <th>Shipping Date</th>
        <th>Payment Date</th> --}}
        <th>Accepted Date</th>
        <th>Status</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orderHeaders as $orderHeader)
        @php      
            if($orderHeader->status == 'CONFIRMED'){
                $status = 'ชำระเงินแล้ว';
            }
            if($orderHeader->status == 'PREPARED'){
                $status = 'หิ้วแล้วรอการจัดส่ง';
            }
            if($orderHeader->status == 'COMPLETED'){
                $status = 'จัดส่งแล้ว';
            }
            if($orderHeader->status == 'ACCEPTED'){
                $status = 'ได้รับสินค้า';
            }
            
        @endphp
        <tr>
            <td>{!! $orderHeader->order_number !!}</td>
            <td>{!! $orderHeader->customer->name !!}</td>
            <td>{!! $orderHeader->address !!}</td>
            <td>{!! $orderHeader->order_date !!}</td>
            {{-- <td>{!! $orderHeader->exp_date !!}</td> --}}
            {{-- <td>{!! $orderHeader->slip_status !!}</td> --}}
            <td>{!!number_format($orderHeader->total_price)   !!} บาท</td>
            <td>{!! $orderHeader->tracking_number !!}</td>
          
            
            {{-- <td>{!! $orderHeader->shipping_id !!}</td> --}}
            {{-- <td>{!! $orderHeader->shipping_date !!}</td> --}}
            {{-- <td>{!! $orderHeader->payment_date !!}</td> --}}
            <td>{!! $orderHeader->accepted_date !!}</td>
            <td>{!! $status !!}</td>
            <td>
                {{-- {!! Form::open(['route' => ['orderSellers.destroy', $orderHeader->id], 'method' => 'delete']) !!} --}}
                <div class='btn-group'>
                    <a href="{!! route('orderSellers.show', [$orderHeader->id]) !!}" class='btn btn-default'>
                        ดูรายละเอียด</a>

                    @if ($orderHeader->status!='COMPLETED')
                         <a href="{!! route('orderSellers.edit', [$orderHeader->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-edit"></i></a>
                    @endif
                    
                    {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
    $(document).ready( function () {
    $('#orderHeaders-table').DataTable();
} );
    </script>
@endsection