<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th style="width:5%;">No.</th>
        <th style="width:10%;">Order No.</th>
        <th style="width:10%;">รายรับ</th>
        <th style="width:10%;">ส่งคืน</th>
        <th style="width:10%;">เงินที่เหลือ</th>
        <th style="width:10%;">ส่งเงินคืน</th>
        <th style="width:10%;">ชื่อลูกค้า</th>
        <th style="width:15%;">เลขบัญชี</th>
        <th style="width:5%;">ใบเสร็จ</th>
        <th colspan="3" style="width:5%;">สถานะ</th>
        </tr>
    </thead>
    <tbody>
   @foreach ($orderHeaders as $key => $orderHeader)
       
   @endforeach
        <tr>
            {{-- {{ dd( $product->shop) }} --}}
            <td>{!! $key++ !!}</td>
            <td>{!! $orderHeader->order_number!!}</td>
            <td>{!! $orderHeader->total_price!!} บาท</td>
            <td>{!! $orderHeader->seller_actual_price!!} บาท</td>
            <td>{!! ($orderHeader->total_price) - ($orderHeader->seller_actual_price) !!} บาท</td>
            <td>
                <a class="btn btn-primary" 
                href="{{ route('returnPayment.uploadFile', ['id' => $orderHeader->payment_id]) }}" 
                > ส่งคืน </a>
            </td>
            <td> {!! $orderHeader->customer->name !!}</td>
            {{-- {{dd($orderHeader->payments)}} --}}
            <td>{{$orderHeader->customer->profile->bank_account}}
                {{$orderHeader->customer->profile->bank_num}}
                {{$orderHeader->customer->profile->bank_name}}
            </td>
    
            <td><img class="materialboxed responsive-img" width="50px" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"></td>
            <td>{!! $orderHeader->status!!}
                {{-- {!! Form::open(['route' => ['products.destroy', $product->product_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', ['product' => $product->product_id , 'shop_id' => $shop_id ]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('products.edit', ['product' => $product->product_id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!} --}}
            </td>
        </tr>

    </tbody>
</table>