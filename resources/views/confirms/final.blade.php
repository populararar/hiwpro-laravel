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
        <div class="row" style="text-align:center;margin-top:2.5%;">
            <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br></i>รายการสั่งซื้อ</div> 
            <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>สรุปรายการสั่งซื้อ</div>
            <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ที่อยู่การจัดส่ง</div>
            <div class="col-sm-12 col-md-3"> 
                <h1 style="text-align:center; margin-top: 2%; color: #df3433;"><i class="fas fa-address-card"></i></h1>
                <h4 style="text-align:center; margin-top: 2%; color: #df3433; font-weight:bolder;">ยืนยันการสั่งซื้อ</h4>
                <div style="width:50px;height:5px; background-color:#cf2132;margin:auto;"></div>
            </div>
            
            
        </div>


    <div class="row">
        <div class="col-2">
            <h5 style="margin-top: 2%; ">ข้อมูลการจัดส่ง : </h5>
        </div>
        <div class=" col-6">
            <p>{{ $address['name'].' '.$address['lastname'] }}</p>
            <p>{{ $address['email'] }}</p>
            <p style="margin-top: 2%; color: gray;">
                {{ $address['address'].' '.$address['city'].' '.$address['state'].' '.$address['country'].' '.$address['zip'] }} </p>
            
        </div>
    </div>

    <div class="weapper shadow" style="padding:3%; ">
            <div class="row" style="margin-top:3%;">
                    @foreach ($shopGroup as $key => $group)
                    @php 
                        $eventShopId = $group->first()->attributes->event_shop_id;
                        // dd($mapSeller[$eventShopId]->name);
                    @endphp  
                    @foreach ($group as $product)
                    <div class="row col-12" style="margin-bottom:20px;">
                      <div class="col-md-12">
                          <h5 style="text-align:left; border-left: 5px solid #df3433;padding-left:5px;"> {{ $key }}</h5>
                      </div>
                        
                        <div class="col-md-8" style="padding:2% 5%;">
                            <div class="row" style="border-top: solid 2px #e7eaec;">
                                <div class="col-2" style="font-weight:bold;">รูป</div>
                                <div class="col-4" style="font-weight:bold;">ชื่อสินค้า</div>
                                <div class="col-2" style="font-weight:bold;">ราคา</div>
                                <div class="col-2" style="font-weight:bold;">จำนวน</div>
                                <div class="col-2" style="font-weight:bold;">รวม</div>
                            </div>
            
                            <div class="row" style="border-top: solid 1px #e7eaec;padding:5% 0%;">
                                <div class="col-2">
                                    <img style="border-radius: 10%" src="{{ asset('/storage/'.$product->attributes->image_product_id ) }}"
                                        class="img-fluid">
                                </div>
                                <div class="col-4">{{ $product->name }}<br> ค่าหิ้ว<br>ค่าจัดส่ง<br> </div>
                                <div class="col-2">{{ $product->price }}<br>{{ $product->attributes->fee }}
                                <br>{{ $product->attributes->shippping }}
                                </div>
                                 @php
                                   $qty = $product->quantity;
                                    $p = $product->price;
                                    $f = $product->attributes->fee;
                                    $s = $product->attributes->shippping;
    
                                    $price = number_format($p);
                                    $fee = number_format($f);
                                    $shipping = number_format($s);
                                   
                                    $sum = $qty*$p;
                                    $count+=$sum;
                                    $Total = $qty*($p+$f+$s);
                                @endphp
                                <div class="col-2">{{ $qty }}
                                </div>
                                <div class="col-2">{{ number_format($sum)}}<br></div>
                            </div>
                            <div class="row" style="border-top: solid 2px #e7eaec;">
                                <div class="col-8 float-right "> </div>
                                <div class="col-4 "> <p class="float-right">Total: {{ number_format($Total)  }} THB</p>     </div>
                            </div>
                           
    
                            @php
                                 $count2+=$Total;
                            @endphp
                          
                        </div>
                        @endforeach
                        <div class="col-md-3 my-4" style="text-align:center;">
                            @if(empty($mapSeller[$eventShopId]->profile))
                            <img width="150px" class="mx-auto card rounded img-fluid" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
                            @else
                            <img width="150px" class="mx-auto card rounded img-fluid" src="{{ asset('storage') }}/{{ $mapSeller[$eventShopId]->profile->img }}"> 
                            @endif
                            {{ $mapSeller[$eventShopId]->name }}
                            <p>คะแนนนักหิ้ว</p>
                            @if ( $mapSeller[$eventShopId]->avg==0)
                            ยังไม่มีคะแนน
                            @elseif( $mapSeller[$eventShopId]->avg==1)
                            <i class="fas fa-star"></i>
                            @elseif( $mapSeller[$eventShopId]->avg==2)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif( $mapSeller[$eventShopId]->avg==3)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif( $mapSeller[$eventShopId]->avg==4)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif( $mapSeller[$eventShopId]->avg==5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @endif
                        </div>
                     </div>  
                        @endforeach
                    
        </div>     
    </div>

    <form action="{{route('orders.store') }}" method="POST">
        @csrf
    <button class="btn btn-success btn-block" type="submit">Submit</button>
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
    function addSeller(eventShopId, sellerId) {
        var data = eventShopId + '|' + sellerId
        var filter = [];
        $("input[name*='seller']").filter(function (index) {
            var a = $(this).val()
            if (a.split("|")[0] == eventShopId) {
                console.log($(this).val().split("|")[0], eventShopId)

                $(this).remove();
                return true
            }
            return false
        });

        if (filter.length < 1) form.append('<input type="text" name="seller[]" value="' + data + '">');
    }


</script>
@endsection