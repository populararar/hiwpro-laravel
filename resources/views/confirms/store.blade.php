@extends('layouts.hiwpro')

@section('content')
<style>

h5{
    text-align: center;
}

</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" style="padding: 0 5%;">
    
    <div class="row" style="text-align:center;margin-top:2.5%;">
        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br></i>รายการสั่งซื้อ</div> 
        <div class="col-sm-12 col-md-3"> 
            <h1 style="text-align:center; margin-top: 2%; color: #df3433;"><i class="fas fa-box-open"></i></h1>
            <h4 style="text-align:center; margin-top: 2%; color: #df3433; font-weight:bolder;">สรุปรายการสั่งซื้อ </h4>
            <div style="width:50px;height:5px; background-color:#cf2132;margin:auto;"></div></div>
        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ที่อยู่การจัดส่ง</div>
        <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ยืนยันการสั่งซื้อ</div>
    </div>

<div class="weapper">
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
                            {{-- @foreach ($seller->profile as $item)
                            @endforeach --}}
                            {{-- <input type="radio" name="rating" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" /> --}}
                            @if(empty($mapSeller[$eventShopId]->profile))
                            <img width="150px" class="mx-auto card rounded img-fluid" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
                            @else
                            <img width="150px" class="mx-auto card rounded img-fluid" src="{{ asset('storage') }}/{{ $mapSeller[$eventShopId]->profile->img }}"> 
                            @endif
                            {{-- {{dd($mapSeller[$eventShopId]->profile)}} --}}
                            {{ $mapSeller[$eventShopId]->name }}
                            <p>คะแนนนักหิ้ว</p>{{$mapSeller[$eventShopId]->avg}}
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
                    <a class="btn btn-success btn-block" href="{{route('confirms.edit',['confirm'=>'address'])}}">ดำเนินการต่อ</a>
                
    </div>
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
    var form = $('#cart-form')
    function addSeller(eventShopId, sellerId){
        var data = eventShopId+'|'+sellerId
        var filter = [];
        $("input[name*='seller']" ).filter(function( index ) {
            var a = $( this ).val()
            if(a.split("|")[0] == eventShopId){
                console.log( $( this ).val().split("|")[0] , eventShopId)
               
                $( this ).remove();
                return true
            }
            return false
        });

        if (filter.length <1)  form.append('<input type="text" name="seller[]" value="'+data+'">');
    }

  
</script>
@endsection