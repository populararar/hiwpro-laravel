@extends('layouts.hiwpro')

@section('content')
<style>
.qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 0.8em;
    font-weight: 700;
    line-height: 30px;
    /* padding: 0 2px */
    ;min-width: 35px;
    text-align: center;
}
.qty .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 25px;
    height: 25px;
    font: 0.8em;
    text-align: center;
    border-radius: 50%;
    }
.qty .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 25px;
    height: 25px;
    font: 0.8em;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}
.minus:hover{
    background-color: crimson !important;
}
.plus:hover{
    background-color: crimson !important;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
input{  
    border: 0;
    width: 2%;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}
.mt-5, .my-5 {
    margin-top: 0rem!important; 
}
/*
 CSS for the main interaction
*/
.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}


.line{
    margin-top:2%;
}
img.card-img-top {
    margin: auto;
    /* width: 300px; */
    border-radius: 10%;
}
</style>
<div class="container">
{{-- @php
    
    $num = $product->price;
  $formattedNum = number_format($product->price);
@endphp --}}

    <div class="row my-3">
        <div class=" col-md-4 card-top">
                <input type="hidden" name="image_product_id" value="{{ $product->image_product_id }}">
            <img class="card-img-top"src="{{ asset('/storage/'.$product->image_product_id) }}">
        </div>

    
        <div class="col-sm-12 col-md-8" style="padding:5%;">
            <form action="{{ route('cart.add') }}" method="POST">
                    {!! csrf_field() !!}
                

                <h4 style='border-bottom:2px solid #df3433; font-size:1.8em;margin:0%;'>{{ $product->name }}</h4>
                <div class="line">
                   <span>
                        <font color="black">ราคา</font>
                        <font color="red" ,font-size="1.2em">{{ number_format($product->price)  }} บาท</font>
                        <font color="gray"style='font-size:0.8em; text-decoration: line-through; margin:0%;'>฿{{number_format($product->actual_price)}}</font>
                    </span>  
                </div>
               
                <div class="row ">
                    <div class="line col-sm-12 col-md-6">
                        ค่าหิ้ว {{ $product->fee }} บาท/ชิ้น
                    </div>
                    <div class="line col-sm-12 col-md-6">
                        ค่าจัดส่ง {{ $product->shipping_price }} บาท
                    </div>
                </div>

                <div class="line qty">
                    จำนวน 
                    <span class="minus bg-dark">-</span>
                    <input type="number" class="count" name="quantity" value="1">
                    <span class="plus bg-dark">+</span>
                </div>

                <br>
                <input type="hidden" name="event_shop_id" value="{{ $eventShop->id }}">
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <input type="hidden" name="price" value="">
                <input type="hidden" name="fee" value="{{  $product->fee  }}">
                <input type="hidden" name="shippping" value="{{  $product->shipping_price  }}">
                
                <div class="row">
                    <div class="col-10"><button type="submit" class="btn btn-outline-danger"><i class="fas fa-cart-plus"></i> หยิบใส่ตะกร้า</button></div>                    
                </div>
            </form>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:5%;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">รายละเอียดสินค้า</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                <div class="container my-3">

                    {{ $product->name }}
                    <br>
                    <span><font color="red">{{ $product->price }}</font> จาก <del class>฿{{ $product->actual_price }}</del> บาท</span>
                    <br>
                    {{ $product->productdetail }}
                </div>
               
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
          </div>
</div>
{{-- container --}}






@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        $(document).on('click', '.plus', function () {
            $('.count').val(parseInt($('.count').val()) + 1);
        });


        $(document).on('click', '.minus', function () {
            $('.count').val(parseInt($('.count').val()) - 1);
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    });
</script>
@endsection