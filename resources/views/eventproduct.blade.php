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

/*
 Styling
*/

.tabset > label {
  position: relative;
  display: inline-block;
  padding: 15px 15px 25px;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: #8d8d8d;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color: #06c;
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: #06c;
}

.tabset > input:checked + label {
  border-color: #ccc;
  border-bottom: 1px solid #fff;
  margin-bottom: -1px;
}

.tab-panel {
  padding: 30px 0;
  border-top: 1px solid #ccc;
}

/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}

.tabset {
  max-width: 65em;
}

.tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
    background: #bd2130;
}
.tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
    background: #bd2130;
}
.tabset > label:hover, .tabset > input:focus + label {
    color: #bd2130;
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

    <h1>Product detail</h1>
    <div class="row">
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

    <div class="tabset" style="margin-top:5%;">
        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
        <label for="tab1">รายละเอียดสินค้า</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
        <label for="tab2">รายละเอียดอีเว้นต์</label>
      
        
        <div class="tab-panels">
          <section id="marzen" class="tab-panel">
            <p>{{ $product->name }}
                <br>
                <span><font color="red">{{ $product->price }}</font> จาก <del class>฿{{ $product->actual_price }}</del> บาท</span>
                <br>
               {{ $product->productdetail }}</p>
            </section>
            <section id="rauchbier" class="tab-panel">
            </section>

        </div>
        
      </div>
      {{-- tabset --}}
      
      {{-- <p><small>Source: <cite><a href="https://www.bjcp.org/stylecenter.php">BJCP Style Guidelines</a></cite></small></p> --}}








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