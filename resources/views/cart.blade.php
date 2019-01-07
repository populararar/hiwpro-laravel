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
        </style>

<div class="container" style="padding: 0 5%;">
        <div class="col">
          <h4 style="margin-top: 2%; color: #df3433;">รายการสั่งซื้อ </h4>
          <p class="h9">สั่งซื้อสินค้ากับหิ้วโปร</p>
        </div>

    <div class="row"  style="background-color:#fff;">
        <div class="col-12">
        <div class="form-group">
            <div class="btn-group d-flex justify-content-center ">
                <button style="text-align:center; width: 50%;"  type="button" class="btn btn-danger">รายการสั่งซื้อ</button>
                <button style="text-align:center; width: 50%;"  type="button" class="btn btn-outline-danger">สรุปรายการสั่งซื้อ</button>
                <button style="text-align:center;width:50% "type="button" class="btn btn-outline-danger align-self-center ">ที่อยู่การจัดส่ง</button>
                <button style="text-align:center;width:50% "type="button" class="btn btn-outline-danger align-self-center ">ยืนยันการสั่งซื้อ</button>
            </div>
        </div>
        </div>
    </div>
    <div class="weapper" style="background-color: #F9F9F9; padding:3%; ">
    
{{--  <a href="#" class="btn btn pull-right btn-primary btn-danger btn-sm " >Update</a> --}}
    
    {{--   <div class="row" style="background-color:#fff;padding:5%;">
    </div>row --}}
    @php
    $sum=0;$count=0;$count2=0; 
    @endphp
   
    @if (!empty($cart))
   
    <div class="row">
        
         @foreach ($cart as $product)
        <div class="col-8" style="padding:2% 5%; background-color:white;margin-top:2%;">
            <h5 style="color:#df3433;">{{ $product->name }}</h5> 
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
                <img style="border-radius: 10%" src="{{ asset('/storage/'.$product->attributes->image_product_id ) }}" class="img-fluid">
                </div>
                <div class="col-4">{{ $product->name }}<br> ค่าหิ้ว<br>ค่าจัดส่ง<br> </div>
                <div class="col-2">{{ $product->price }}<br>{{ $product->attributes->fee }}<br>{{ $product->attributes->shippping }}</div>
                <div class="col-2">{{ 
                
                $qty = $product->quantity, 
                $p = $product->price, 
                $f = $product->attributes->fee,
                $s = $product->attributes->shippping
                }}</div>
                <div class="col-1">{{ $sum = $qty*$p  }}</div>
                <div class="col-1"><a href="{{ route('cart.flush', ['id' => $product->id]) }}" style="color:#df3433;"><i class="far fa-trash-alt"></i></a></div>
                
                @php
                $count+=$sum;
                @endphp
               
            </div>
            <div class="row" style="border-top: solid 2px #e7eaec;">
                <div class="col-8 float-right ">  1 Items Total: {{ $Total = ($sum+$f+$s) }} THB</div>
                <div class="col-4 float-left"> {{ $count2+=$Total }}THB</div>
                   
            </div>
        </div>
    @endforeach 
    {{-- fixed-bottom --}}
        <div class="col-4  " style="padding:2% 5%; background-color:white; width:80%;  margin:2%;">
            <div class="row">
                    <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Summary </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Subtotal</th>
                                <td> {{$count}} THB </td>
                                
                              </tr>
                              <tr>
                                <th scope="row">All Total</th>
                                <td> {{$count2}} THB</td>
                               
                              </tr>
                             
                            </tbody>
                          </table>
                
            </div>
            <a  href="{{  route('cart.seller') }}" style='color: #df3433;'> 
            <button type="button" class="btn btn-success">Begin Checkout</button></a>
        </div>
    </div>

   
    @else
    <div class="row" style="border-top: solid 2px #e7eaec;">
            <div class=" float-right ">
               1 Items Total: {{ $Total }} THB<h5> </h5>
            </div>
                {{ $sum+= $Total}} THB
        </div>
    การสั่งสินค้าเป็น 0
    @endif
    
    </div>
    {{-- wrapper --}}
  
</div>
<!-- container -->

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