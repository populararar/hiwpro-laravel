@foreach( $orderHeaders->orderDetails as $item)
{{-- {{dd($item)}} --}}
@php

  $num = $orderHeaders->total_price;
  $formattedNum = number_format($num);  
  $price = $item->price;
  $qrt = $item->qrt;
  $fee = $item->fee;
  $ship = $item->shipping_rate;
  $sum1 = ($price+$fee+$ship)*$qrt;
  // $sum1 = number_format($sum1);
@endphp
{{-- {{dd($item)}} --}}
  <div class="shadow-sm  mb-5 bg-white rounded">
    <div class="row">
      <div class="col-md-5">
          <img class='card-img-top w-50' src="{{ asset('/storage/'.$item->product->image_product_id) }}">
      </div>
      <div class="col-md-7 " style="padding-top:2%;">
        <h1 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h1>
        <p>ประเภทสินค้า : เครื่องสำอางค์</p>
        <p>ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
        <p>จำนวน {{$item->qrt }} ชิ้น</p>
        <p>ค่าหิ้ว {{$item->fee }} บาท/ชิ้น</p>
        <p>ค่าส่ง {{$ship }} บาท/ชิ้น</p>
        <p>ราคา {{ number_format($price) }} บาท/ชิ้น</p>
        <p>รวม {{ number_format($sum1) }} บาท</p>
      </div>
    </div>
  </div> 

  @if(!empty($orderHeaders->seller_actual_price))
@php
  $uesd =  $orderHeaders->seller_actual_price;
  $getQty =  $item->seller_actual_qty;
  
  $sum2 = ($price+$fee+$ship)*$getQty;
  // $sum2 = number_format($sum2);
  $total = $sum1-$sum2;
@endphp

  <div class="page-header">
      <h3>สินค้าที่จัดส่ง</h3>
    </div>
  <div class="shadow-sm  mb-5 bg-white rounded">
      <div class="row">
        <div class="col-md-5">
            <img class='card-img-top w-50' src="{{ asset('/storage/'.$item->product->image_product_id) }}">
        </div>
        <div class="col-md-7 " style="padding-top:2%;">
          <h1 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h1>
          <p>ประเภทสินค้า : เครื่องสำอางค์</p>
          <p>ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
          <p>จำนวน {{$getQty }} ชิ้น</p>
          <p>ค่าหิ้ว {{$item->fee }} บาท/ชิ้น</p>
          <p>ค่าส่ง {{$ship }} บาท/ชิ้น</p>
          <p>ราคา {{ number_format($price) }} บาท/ชิ้น</p>
          <p>รวม {{ number_format($sum2) }} บาท</p>
          <h1>ยอดเงินคืน <span><font color='red'> {{$total}}</font> บาท</span></h1>
         
        </div>
      </div>
    </div>
  @endif


@endforeach