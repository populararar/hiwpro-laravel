



<div class="container">


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
    <p>{!! $orderHeader->address !!}</p>
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
            $payment = 'ชำระเงินแล้ว';
        }
        if($orderHeader->status == 'PREPARED'){
            $payment = 'หิ้วแล้วรอการจัดส่ง';
        }
        if($orderHeader->status == 'COMPLETED'){
            $payment = 'จัดส่งแล้ว';
        }
        if($orderHeader->status == 'ACCEPTED'){
            $payment = 'ได้รับสินค้า';
        }
    @endphp

    <p >{!! $payment !!}</p>
</div>


<!-- Event Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tracking', 'ชื่อบริษัทขนส่ง :') !!}
    {!! Form::select('tracking', ['บริษัท ไปรษณีย์ไทย จำกัด ThailandPost' => 'บริษัท ไปรษณีย์ไทย จำกัด ThailandPost',
                                    'Kerry Express Thailand เคอรี่ เอ็กซ์เพรส' => 'Kerry Express Thailand เคอรี่ เอ็กซ์เพรส',
                                    'Alpha Fast – บริษัท อัลฟ่า เพอร์ฟอร์มานซ์ กรุ๊ป' => 'Alpha Fast – บริษัท อัลฟ่า เพอร์ฟอร์มานซ์ กรุ๊ป',
                                    'aCommerce – เอ คอมเมิร์ช' => 'aCommerce – เอ คอมเมิร์ช',
                                    'Lalamove – ลาลามูฟ' => 'Lalamove – ลาลามูฟ',
                                    'SCG  Express – เอสซีจี เอ็กซ์เพรส' => 'SCG  Express – เอสซีจี เอ็กซ์เพรส',
                                    'Line Man' => 'Line Man',
                                              
     ], null, ['class' => 'form-control']) !!}
</div>

<!-- Tracking Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tracking_number', 'Tracking Number:') !!}
    {!! Form::text('tracking_number', null, ['class' => 'form-control']) !!}
</div>
    

<!-- Shipping Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('shipping_date', 'วันที่จัดส่ง:') !!}
    @if (empty($orderHeader->shipping_date))
        <p>ยังไม่ถูกจัดส่ง</p>
    @endif
    <p>{!! $orderHeader->shipping_date !!}</p>
</div>

<!-- Accepted Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('accepted_date', 'วันที่รับสินค้า:') !!}
    @if (empty($orderHeader->shipping_date))
        <p>ยังไม่รับสินค้า</p>
    @endif
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
                    <h3><span> ทั้งหมด <font color="red"> {{number_format($sum)}} </font> บาท</span></h3>
                </div>
                @php
                    $sum += $sum;
                    $num += 1;
                @endphp
            </div>
        
    </div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderSellers.index') !!}" class="btn btn-default">Cancel</a>
</div>
</div>

