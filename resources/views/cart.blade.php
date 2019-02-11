@extends('layouts.hiwpro')

@section('content')
<style>
    .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
        }

        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            }
        .qty .minus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }
        .minus:hover{
            background-color: #717fe0 !important;
        }
        .plus:hover{
            background-color: #717fe0 !important;
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
        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 29.333333%;
        }
        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0%;
        }
        /* ---------------------- */
        *{box-sizing:border-box} 
.tabs { 
 
  padding: 0px; 
  margin: 0 auto; 
  position: relative; 
  border: 1px solid #DEE8F2; 
} 
section { 
  display: none;  
  padding: 15px; 
  background: white; 
  position: absolute; 
  top: 0; 
  left: 180px; 
} 
p { 
  margin: 0; 
} 
input { 
  display: none; 
} 
label { 
  display: block; 
  width: 180px; 
  padding: 15px; 
  color: #4F5966; 
  background: #DEE8F2; 
  cursor: pointer; 
} 
input:checked + label { 
  color: #555; 
  background: white; 
} 
#tab1:checked ~ #content1, #tab2:checked ~ #content2, #tab3:checked ~ #content3, #tab4:checked ~ #content4 { 
  display: block; 
} 
section { 
  animation: scale 0.7s ease-in-out; 
} 
@keyframes scale { 
  0% { 
  transform: scale(0.9); 
  opacity: 0; 
  } 
  50% { 
  transform: scale(1.005); 
  opacity: 0.5; 
  } 
  100% { 
  transform: scale(1); 
  opacity: 1; 
  } 
}
/* 
********************
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
.col-4-2 {
    /* -ms-flex: 0 0 33.333333%; */
    
    flex: 0 0 35.333333%;
    /* max-width: 26.333333%; */
}
table {
    border-collapse: collapse;
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    border: 1px solid #e6e6e6;
    border-bottom: 0;
    padding-left: 10px;
    padding-top: 10px;
}
caption {
    display: table-caption;
    text-align: -webkit-center;
}

</style>


@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container">

    <div class="row" style="text-align:center;">
        <div class="col-sm-12 col-md-3"> 
            <h1 style="text-align:center; margin-top: 2%; color: #df3433;"> <i class="fas fa-book-open"></i></h1>
            <h4 style="text-align:center; margin-top: 2%; color: #df3433; font-weight:bolder;">รายการสั่งซื้อ </h4>
            <div style="width:50px;height:5px; background-color:#cf2132;margin:auto;"></div></div>

        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>สรุปรายการสั่งซื้อ</div>
        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ที่อยู่การจัดส่ง</div>
        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ยืนยันการสั่งซื้อ</div>
    </div>
    
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> กรุณาอ่านเงื่อนไขการใช้บริการก่อนสั่งซื้อสินค้า <a href="#" class="alert-link"></a>
        </div>
    {{-- style="margin-bottom:20px;" --}}
  
            @foreach ($shopGroup as $key => $group)
            <div class="row carts d-none d-sm-block" style="padding:2%;">
            
                <h5 style="border-left: 5px solid #df3433;padding-left:5px;">{{ $key }}</h5>
                    @foreach ($group as $product)
                    <div class="col-md-12">
                        {{-- <h5 style="color:#df3433;">#{{ $product->id }} {{ $product->name }}</h5> style="border-top: solid 2px
                        #e7eaec;"--}}
                        {{-- header --}}
                        <div class="row col-12">

                            <div class="col-2" style="font-weight:bold;"></div>
                            <div class="col-4" style="font-weight:bold;">ชื่อสินค้า</div>
                            <div class="col-2" style="font-weight:bold;">ราคา</div>
                            <div class="col-2" style="font-weight:bold;">จำนวน</div>
                            <div class="col-1" style="font-weight:bold;">รวม</div>
                            <div class="col-1" style="font-weight:bold;">แก้ไข</div>
                        </div>
                        {{-- body --}}
                <div class="row col-12" style="border-top: solid 1px #e7eaec;padding:2% 0%;">

                    <div class="col-2">
                        <img style="border-radius: 10%" src="{{ asset('/storage/'.$product->attributes->image_product_id ) }}"
                            class="img-fluid">
                    </div>
                    @php
                    $qty = $product->quantity;
                    $p = $product->price;
                    $f = $product->attributes->fee;
                    $s = $product->attributes->shippping;
                    @endphp
                    <div class="col-4">{{$product->name}}<br>ค่าหิ้ว<br>ค่าจัดส่ง</div>
                    <div class="col-2">{{$p}}<br>{{$f}}<br>{{$s}}</div>
                    <div class="col-2">
                        <span>
                            <button style="float:left;"  type="button" onclick="decrease({{$product->id}})" class="btn-sm btn btn-default">-</button>
                            <p style="float:left;" id="product-{{$product->id}}">&nbsp {{ $qty }} &nbsp <p>
                            <button style="float:left;"  type="button" onclick="increase({{$product->id}})" class="btn-sm btn btn-default">+</button>

                        </span>
                    </div>
                    <div class="col-1"><p id="product-total-{{$product->id}}">{{ number_format($sum = $qty*$p) }}</p></div>
                    <div class="col-1"><a href="{{ route('cart.remove', ['id' => $product->id]) }}" style="color:#df3433;"><i
                                class="far fa-trash-alt"></i></a>
                    </div>

                            @php
                    $count+=$sum;$Total = ($sum+$f+$s);
                    @endphp

                </div>
                {{-- footer --}}
                <div class="row" style="border-top: solid 2px #e7eaec;">
                    <div class="col-8 float-right "> </div>
                    <div class="col-4 float-left">Total: {{ number_format($Total)  }} THB </div>
                </div>

                        @php
                        $count2+=$Total
                        @endphp

            </div>
            @endforeach
        </div>
            <div class="row d-none d-sm-block col-lg-12 justify-content-center">
                @include('saler')
            </div>
            @endforeach

            @foreach ($shopGroup as $key => $group)
            <div class="row carts pro-sm d-block d-sm-none">

        <h5 style="border-left: 5px solid #df3433;padding-left:5px;">{{ $key }}</h5>
        @foreach ($group as $product)
     
            <div class="row" style="border-top: solid 1px #e7eaec;padding:2% 0%;">
                <div class="col-6">
                    <img style="border-radius: 10%" src="{{ asset('/storage/'.$product->attributes->image_product_id ) }}"
                        class="img-fluid">
                </div>
                <div class="col-6">
                 <dt> {{ $product->name }} </dt> ราคา :  {{ $product->price }}
                 <br>ค่าหิ้ว : {{ $product->attributes->fee }}
                 <br> ค่าจัดส่ง :{{ $product->attributes->shippping }}
                 <br>

                <div>
                            <span>
                                <button style="float:left;"  type="button" onclick="decrease({{$product->id}})" class="btn-sm btn btn-default">-</button>
                                <p style="float:left;" id="product-{{$product->id}}">&nbsp {{ $qty }} &nbsp <p>
                                <button style="float:left;"  type="button" onclick="increase({{$product->id}})" class="btn-sm btn btn-default">+</button>
                            </span>
                </div><br>
                        @php
                        $qty = $product->quantity;
                        $p = $product->price;
                        $f = $product->attributes->fee;
                        $s = $product->attributes->shippping;
                        $sum = $qty*$p;
                        $count+=$sum;$Total = ($sum+$f+$s);
                        @endphp 
                        <div class="float-left">Total: {{number_format($Total)  }} THB </div>
                        <br>
                        <div class="float-right ">
                            <button class="btn btn-danger" href="{{ route('cart.remove', ['id' => $product->id]) }}">
                                <i class="far fa-trash-alt"></i></button> </div>
                        </div>
                    <div  style="border-top: solid 2px #e7eaec;">
                    
                    </div>
                    
                
                @endforeach
                {{-- <div class="col-12"><h3>เลือกนักหิ้ว</h3> </div> --}}
               
                <div class="col-12 d-block d-sm-none">
                    @include('saler')
                </div>

            </div>
            @endforeach
       </div> 
    </div>
</div> 

    <div class="col-md-12 col-sm-12">
            <div class="card border-danger mb-3 mt-5" style="max-width: 100%;">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    {{-- <h5>{{$Total}}</h5> --}}
                    <h5 style="text-align:center;"><span> TOTAL <font color="red"> {{ number_format($count2)}} </font>TH</span></h5>
                    <form id="cart-form" method="POST" name="cart-form" action="{{route('confirms.store')}}">
                        {!! csrf_field() !!}

                        @if(!empty($mapSeller))
                        @foreach ($mapSeller as $key => $seller)
                        <input type="hidden" name="seller[]" value="{{ $key.'-'.$seller->id}}">                      
                        @endforeach
                        @endif
                        <button type="button" class="btn btn-success btn-block col-4 mx-auto" onclick="saveData()">Submit</button>
                    </form>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p> --}}
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<script type="text/javascript">
function increase(id) {
            $.ajax({
                 url: '/cart/product/' + id + '/increase',
                success: function (e) {
                    location.reload();
                    var product = e.cart[id]
                    var quantity = product.quantity
                    var price =  product.price
                    var fee = product.attributes.fee
                    var shippping   = product.attributes.shippping

                    var total = (Number(price)+Number(fee)) *Number(quantity)

                    $('#product-' + id).text(quantity)
                    $('#product-total-' + id).text(total)

                   
                }
            })
        }
        function decrease(id) {
            $.ajax({
                 url: '/cart/product/' + id + '/decrease',
                success: function (e) {
                    location.reload();
                    var product = e.cart[id]
                    var quantity = product.quantity
                    var price =  product.price
                    var fee = product.attributes.fee
                    var shippping   = product.attributes.shippping

                    var total = (Number(price)+Number(fee)) *Number(quantity)

                    $('#product-' + id).text(quantity)
                    $('#product-total-' + id).text(total)

                   
                }
            })
        }

        function clear(id) {
            $.ajax({
                 url: '/cart/product/' + id + '/clear',
                success: function (e) {
                    location.reload();
                    var product = e.cart[id]
                    var quantity = product.quantity
                    var price =  product.price
                    var fee = product.attributes.fee
                    var shippping   = product.attributes.shippping

                    var total = (Number(price)+Number(fee)) *Number(quantity)

                    $('#product-' + id).text(quantity)
                    $('#product-total-' + id).text(total)

                   
                }
            })
        }
</script>
@endsection

@section('scripts')

<script>
   

    var form = $('#cart-form')
    function addSeller(eventShopId, sellerId) {
        var data = eventShopId + '-' + sellerId
        var filter = [];
        $("input[name*='seller']").filter(function (index) {
            var a = $(this).val()
            if (a.split("-")[0] == eventShopId) {
                console.log($(this).val().split("-")[0], eventShopId)

                $(this).remove();
                return true
            }
            return false
        });

        if (filter.length < 1) form.append('<input type="text" name="seller[]" value="' + data + '">');
    }

    function activate() {
        $("input[name*='seller']").each(function (index) {
            var a = $(this).val()
            console.log('#row-seller-' + a)
            $('#row-seller-' + a).addClass("activate")
        })
    }

    activate();

    function saveData() {
        var i = 0
        $("input[name*='seller']").each(function (index) {
            i++;
        })
        var count =  {{ count($shopGroup) }};
        if (i < count) {
        alert("Please select seller!")
        return
    }
    form.submit()
    }
</script>
@endsection