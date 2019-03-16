<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<style>
.zoom {

  transition: transform .2s;

  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(3); /* IE 9 */
  -webkit-transform: scale(3); /* Safari 3-8 */
  transform: scale(3); 
}
</style>
@php
    $status = "";
   
@endphp
<table class="table table-responsive" id="return-table">
    <thead>
        <tr>
        <th style="width:5%;">No.</th>
        <th style="width:10%;">Order No.</th>
        <th style="width:10%;">ยอดโอน</th>
        <th style="width:10%;">ยอดซื้อ</th>
        <th style="width:10%;">ส่งคืนลูกค้า</th>
        <th style="width:10%;">ส่งเงินคืน</th>
        <th style="width:10%;">ชื่อลูกค้า</th>
        <th style="width:15%;">เลขบัญชี</th>
        <th style="width:5%;">ใบเสร็จ</th>
        <th colspan="3" style="width:5%;">สถานะ</th>
        </tr>
    </thead>
    <tbody>
   @foreach ($orderHeaders as $key => $orderHeader)
  @php
   if ($orderHeader->status == "WAITING") {
        # code...
        $status ='รอการชำระเงิน';
    }
    //แดง
    if ($orderHeader->status == "UPLOADED") {
        # code...
        $status ='รอการตรวจสอบ';
    }
    //เหลือง
    if ($orderHeader->status_send == "CLOSE") {
        # code...
        $status ='ออร์เดอร์หมดอายุ';
    }
    //เทาอ่อน
    if($orderHeader->status == 'CONFIRMED'){
        $status = 'ชำระเงินแล้ว';
    }
    //เขียว
    if($orderHeader->status == 'PREPARED'){
        $status = 'หิ้วแล้วรอการจัดส่ง';
    }
    if($orderHeader->status == 'NOPREPARED'){
        $status = 'หิ้วแล้วรอการจัดส่ง';
    }
    //ฟ้า
    if($orderHeader->status == 'COMPLETED'){
        $status = 'จัดส่งแล้ว';
    }
    //ฟ้า
    if($orderHeader->status == 'ACCEPTED'){
        $status = 'ได้รับสินค้า';
    }
    if($orderHeader->status == 'RETURNED'){
        $status = 'ส่งคืนเรียบร้อย';
    }
      $key++;
  @endphp
        <tr>
            {{-- {{ dd( $product->shop) }} --}}
            <td style ="width:5%;">{!! $key !!}</td>
            <td style ="width:3%;">{!! $orderHeader->order_number!!}</td>
            <td style ="width:3%;">{!! $orderHeader->total_price!!} บาท</td>
            <td style ="width:5%;">{!! $orderHeader->seller_actual_price!!} บาท</td>
            <td style ="width:5%;">{!! ($orderHeader->total_price) - ($orderHeader->seller_actual_price) !!} บาท</td>
            <td style ="width:5%;">
                @if ($orderHeader->status == 'RETURNED')
                   ส่งแล้ว 
                @else
                <a class="btn btn-primary" 
                href="{{ route('returnPayment.uploadFile', ['id' => $orderHeader->payment_id]) }}" 
                > ส่งคืน </a>
                @endif
                
            </td>
            <td style ="width:5%;"> {!! $orderHeader->customer->name !!}</td>
            {{-- {{dd($orderHeader->payments)}} --}}
            <td>{{$orderHeader->customer->profile->bank_account}}<br>
                {{$orderHeader->customer->profile->bank_num}}<br>
                {{$orderHeader->customer->profile->bank_name}}
            </td>
    
            <td>
                {{-- {{dd($orderHeader->payment->img_return)}} --}}
                @if ($orderHeader->payment->img_return)
                <img class="materialboxed responsive-img zoom" width="50px" src="{{ asset('storage'.$orderHeader->payment->img_return)}}">
                @else
                -
                {{-- <img class="materialboxed responsive-img zoom" width="50px" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> --}}
                @endif
                
            <td>{!! $status !!}
                {{-- {!! Form::open(['route' => ['products.destroy', $product->product_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', ['product' => $product->product_id , 'shop_id' => $shop_id ]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('products.edit', ['product' => $product->product_id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!} --}}
            </td>
        </tr>
     
   @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
    $(document).ready( function () {
    $('#return-table').DataTable();
} );
    </script>
@endsection