@foreach( $orderHeaders->orderDetails as $item)
@php
  $num = $orderHeaders->total_price;
  $formattedNum = number_format($num);  
  $price = $item->price;
  $qrt = $item->qrt;
  $sum = $price*$qrt;
  $sum = number_format($sum);
@endphp

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
       
        <p>ราคา {{ $sum }} บาท/ชิ้น</p>
      </div>
    </div>
  </div> 

  @if(!empty($orderHeaders->seller_actual_price))
  <div class="page-header">
      <h3>สินค้าที่จัดส่ง</h3>
    </div>
  <div class="shadow-sm  mb-5 bg-white rounded">
      <div class="row">
        <div class="col-md-5">
            <img class='card-img-top w-50' src="{{ asset('/storage/'.$item->product->image_product_id) }}">
        </div>
       
          <p>ราคาที่แม่ค้าได้แปะๆ : </p>
          <p>
            <p class="font-gray">
              {{ $orderHeaders->seller_actual_price }} บาท </p>
          </p>
       
        <div class="col-md-7 " style="padding-top:2%;">
          <h1 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h1>
          <p>ประเภทสินค้า : เครื่องสำอางค์</p>
          <p>ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
          <p>จำนวน {{$item->qrt }} ชิ้น</p>
         
          <p>ราคา {{ $sum }} บาท/ชิ้น</p>
        </div>
      </div>
    </div>
  @endif


@endforeach