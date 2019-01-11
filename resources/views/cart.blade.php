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
            padding: 0 2px
            ;min-width: 35px;
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
</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" style="padding: 0 5%;">
    <div class="col">
        <h4 style="margin-top: 2%; color: #df3433;">รายการสั่งซื้อ </h4>
        <p class="h9">สั่งซื้อสินค้ากับหิ้วโปร</p>
    </div>

    <div class="row" style="background-color:#fff;">
        <div class="col-12">
            <div class="form-group">
                <div class="btn-group d-flex justify-content-center ">
                    <button style="text-align:center; width: 50%;" type="button" class="btn btn-danger">รายการสั่งซื้อ</button>
                    <button style="text-align:center; width: 50%;" type="button" class="btn btn-outline-danger">สรุปรายการสั่งซื้อ</button>
                    <button style="text-align:center;width:50% " type="button" class="btn btn-outline-danger align-self-center ">ที่อยู่การจัดส่ง</button>
                    <button style="text-align:center;width:50% " type="button" class="btn btn-outline-danger align-self-center ">ยืนยันการสั่งซื้อ</button>
                </div>
            </div>
        </div>
    </div>

    <div class="weapper" style="background-color: #F9F9F9; padding:3%; ">
        @foreach ($shopGroup as $key => $group)
        {{-- {{dd($group->saller)}} --}}
        <div class="row" style="margin-bottom:20px;">
            <h4>SHOP : {{ $key }}</h4>
            @foreach ($group as $product)
            <div class="col-8" style="padding:2% 5%; background-color:white;margin-top:2%;">
                <h5 style="color:#df3433;">#{{ $product->id }} {{ $product->name }}</h5>
                <div class="row" style="border-top: solid 2px #e7eaec;">
                    <div class="col-2" style="font-weight:bold;">รูป</div>
                    <div class="col-4" style="font-weight:bold;">ชื่อสินค้า</div>
                    <div class="col-2" style="font-weight:bold;">ราคา</div>
                    <div class="col-2" style="font-weight:bold;">จำนวน</div>
                    <div class="col-1" style="font-weight:bold;">รวม</div>
                    <div class="col-1" style="font-weight:bold;">แก้ไข</div>
                </div>

                <div class="row" style="border-top: solid 1px #e7eaec;padding:5% 0%;">

                    <div class="col-2">
                        <img style="border-radius: 10%" src="{{ asset('/storage/'.$product->attributes->image_product_id ) }}"
                            class="img-fluid">
                    </div>
                    <div class="col-4">{{ $product->name }}<br> ค่าหิ้ว<br>ค่าจัดส่ง<br> </div>
                    <div class="col-2">{{ $product->price }}<br>{{ $product->attributes->fee }}<br>{{
                        $product->attributes->shippping }}
                    </div>
                    <div class="col-2">{{

                        $qty = $product->quantity,
                        $p = $product->price,
                        $f = $product->attributes->fee,
                        $s = $product->attributes->shippping
                        }}
                    </div>
                    <div class="col-1">{{ $sum = $qty*$p }}</div>
                    <div class="col-1"><a href="{{ route('cart.flush', ['id' => $product->id]) }}" style="color:#df3433;"><i
                                class="far fa-trash-alt"></i></a>
                    </div>

                    @php
                    $count+=$sum;
                    @endphp

                </div>
                <div class="row" style="border-top: solid 2px #e7eaec;">
                    <div class="col-8 float-right "> 1 Items Total: {{ $Total = ($sum+$f+$s) }} THB</div>
                    <div class="col-4 float-left"> {{ $count2+=$Total }}THB</div>
                </div>
              
            </div>
            @endforeach
            @include('saler')
        </div>
        @endforeach
    </div>
    <form id="cart-form" method="POST" name="cart-form" action="{{route('confirms.store')}}">
            {!! csrf_field() !!}

            @if(!empty($mapSeller))
                @foreach ($mapSeller as $key => $seller)
                    <input type="hidden" name="seller[]" value="{{ $key.'-'.$seller->id}}" >
                @endforeach
            @endif
        <button type="button" class="btn btn-success btn-block" onclick="saveData()">Submit</button>
    </form>
</div>

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
    var form = $('#cart-form')
    function addSeller(eventShopId, sellerId){
        var data = eventShopId+'-'+sellerId
        var filter = [];
        $("input[name*='seller']" ).filter(function( index ) {
            var a = $( this ).val()
            if(a.split("-")[0] == eventShopId){
                console.log( $( this ).val().split("-")[0] , eventShopId)
               
                $( this ).remove();
                return true
            }
            return false
        });

        if (filter.length <1)  form.append('<input type="text" name="seller[]" value="'+data+'">');
    }

    function activate() {
        $("input[name*='seller']" ).each(function(index){
            var a = $(this).val()
            console.log('#row-seller-'+a)
            $('#row-seller-'+a).addClass("activate")
        })
    }

    activate();

    function saveData(){
        var i = 0
        $("input[name*='seller']" ).each(function(index){
            i++;
        })

        if (i < {{ count($shopGroup) }}) {
            alert("Please select seller!")
            return
        }
        form.submit()
    }
</script>
@endsection