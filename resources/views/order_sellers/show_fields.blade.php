
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
<style>
h5,h1,h3{
    font-family: 'Kanit';
    /* font-weight: bolder; */
}

</style>
@php
    $countSum = 0;
    $sum = 0;
    $num = 1;
@endphp

    <h3>เลขที่การสั่งซื้อ : {{$orderHeader->order_number}}</h3>
<!-- Address Field -->
<div class="form-group  col-md-6">
    {!! Form::label('address', 'รายละเอียดการจัดส่ง:') !!}
    <p>{!! $orderHeader->customer->name !!}</p>
    <p>{!! $orderHeader->customer->email !!}</p>
    <p>ที่อยู่ในการจัดส่ง : <br>{!! $orderHeader->address !!}</p>
</div>

<!-- Tracking Number Field -->
<div class="form-group  col-md-6">
    {!! Form::label('tracking_number', 'จัดส่งโดย') !!}
    <p>Post: {!! $orderHeader->tracking !!}</p>
    <p>Tracking Number: {!! $orderHeader->tracking_number !!}</p>
</div>

<!-- Order Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('order_date', 'วันที่สั่งซื้อ:') !!}
    <p>{!! $orderHeader->order_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group  col-md-6">
    {!! Form::label('status', 'Status:') !!}
    @php
        if($orderHeader->status == 'CONFIRMED'){
            $orderStatus = 'ชำระเงินแล้ว';
        }else if($orderHeader->status == 'PREPARED'){
            $orderStatus = 'หิ้วแล้วรอการจัดส่ง';
        }else if($orderHeader->status == 'COMPLETED'){
            $orderStatus = 'จัดส่งแล้ว';
        }else if($orderHeader->status == 'ACCEPTED'){
            $orderStatus = 'ได้รับสินค้า';
        } else{
            $orderStatus = '';
        }
    @endphp

    <p >{!! $orderStatus !!}</p>
</div>

<!-- Slip Status Field -->
<div class="form-group  col-md-6">
    {!! Form::label('slip_status', 'สถานะการสั่งซื้อ:') !!}
    @php
        if($orderHeader->slip_status == 'UPLOADED'){
            $payment = 'ชำระเงินแล้ว';
        } else if($orderHeader->slip_status == 'WAITING'){
            $payment = 'รอการชำระเงิน';
        }
        else{
            $payment = '';
        }
    @endphp
    <p>{!! $payment !!}</p>
</div>

<!-- Shipping Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('shipping_date', 'วันที่จัดส่ง:') !!}
    <p>{!! $orderHeader->shipping_date !!}</p>
</div>

<!-- Accepted Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('accepted_date', 'วันที่รับสินค้า:') !!}
    <p>{!! $orderHeader->accepted_date !!}</p>
</div>


<div class="col-sm-12">
        <h3>รายละเอียดสินค้า</h3>  
            <div class="card card-body">
               {{-- {{$orderHeaders->orderDetails->}} --}}
               @foreach ($orderHeader->orderDetails as $orderdetail)
    
                <div class="shadow  mb-5 bg-white rounded">
                    <div class="row">
                        @php
                            $price = $orderdetail->product->price;
                            $fee = $orderdetail->product->fee;
                            $shipping = $orderdetail->product->shipping_price;
                            $qrt = $orderdetail->qrt;
                            $sum = $qrt*($price+$fee+$shipping);
                        @endphp
                    <div class="col-md-5">
                        <img class='card-img-top' style="width:300px;" src="{{ asset('/storage/'.$orderdetail->product->image_product_id) }}">
                    </div>
                    <div class="col-md-7 " style="padding-top:2%;">
                        <h5  style="border-left:3px solid #df3433;padding-left:5px;">{{$num}}. ชื่อสินค้า : {{$orderdetail->product->name}}</h5>
                        <p> ร้านค้า {{$orderdetail->product->shop->name}} </p>
                        <p> ประเภทสินค้า : เครื่องสำอางค์</p>
                        <p> ชื่อผู้หิ้ว : {{$orderdetail->seller->name }}</p>
                        <p> จำนวน {{$orderdetail->qrt }} ชิ้น</p>
                        <p> ราคา {{number_format($price)}} บาท/ชิ้น/ชิ้น</p>
                        <p> ค่าหิ้ว {{number_format($fee)}} บาท/ชิ้น</p>
                        <p> ค่าส่ง {{number_format($shipping)}} บาท/ชิ้น</p>
                        <h5>ราคารวม {{number_format($sum)}} บาท </h5>
                    </div>
                    </div>
                </div>
                
                @endforeach
                <div style="text-align:center;">
                    <h3><span> ทั้งหมด <font color="red">{{number_format($sum)}}</font> บาท</span></h3>
                </div>

                @php
                    $sum += $sum;
                    $num += 1;
                @endphp
                
            </div>
        
    </div>