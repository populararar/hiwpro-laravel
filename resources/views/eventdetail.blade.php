@extends('layouts.hiwpro')

@section('content') 
<style>
img:hover{
    opacity: 0.5;
    transition:ease-in 0.2s;
}
.cardp{
    width:-10% !important;
    background: #fff;
    margin: 1% 1%;
    padding:0%;
    cursor: pointer;  
    overflow: hidden;
}

.cardp:hover{
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
} 

.box-white{
    background: #fff;
    top: 100%;
    position: relative;
    transition: all .3s ease-out;
}
.cardp:hover> .box-white{
    top: 0;
} 
.card-in{
    padding: 5%;
    text-align: center;
}

.col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 22%;
}
.col-sm-fix{
    /* -ms-flex: 0 0 25%;
    flex: 0 0 25%; */
    max-width: 100%;
    margin:3.5%;
}
.part{
    padding: 2.5%;
    margin:0% 0% 3% 0%;
    background-color: #ffffff;
    /* border-radius: 2%; */
}
.box-r{
    float: right !important;
    margin-right: 2%;
    margin-bottom: 2%;
}
.box-l{
    float: left !important;
    margin-left: 2%;
    margin-bottom: 2%;
}


</style>

<div class="container" >
 


    <div class="wrapper">
           
         <div class="row part" >
             <div class="col-sm-12 col-lg-7">
                <img class='card-img-top'  src='{{ asset('/storage/'.$event->imgPath) }}'>
             </div>
             <div class=" col-sm-12 col-lg-5" style="padding:5%;">
                <h4 style="color:#df3433; text-align:center; font-weight:bold;"> {{ $event->eventName }}</h4>  
                <p style="color:#df3433; text-align:center;"><i class="fas fa-calendar"></i> เริ่มวันที่ {{ $event->start_date }} - {{ $event->last_date}} </p>
                <br>
                <p style=" text-align:center;">{{ $event->detail}}</p>     
            </div>
             
         </div>  
    </div>
    
    {{-- style='border-radius: 10%' --}}

    <div class="wrapper">
        <div class="row" style="border-buttom:1px solid  #ccc;">
            <div class="col-md-2"></div>
            <div class="col-sm-12 col-md-10">
                <h4 style="color:#df3433; line-height : -1;">{{ $event->eventName }}</h4><br>
                Event / {{ $event->eventName }}
            </div>
                
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-sm-12 col-md-10">
                <div class="row" style="margin:auto;">
                    @foreach ($productEvents as $pe) 
                    <a  href="{{  route('event.detail.product', ['id' => $pe->product_id, 'event_shop_id' => $pe->event_shop_id]) }}" style='color: #df3433;'> 
                    <div class="col-md-3 cardp">
                        <img class='card-img-top' src="{{ asset('/storage/'.$pe->product->image_product_id) }}">
                        <div class="card-in">
                            <p style='color:#df3433; font-size:1em;line-height :1.2;margin:2%;'> {{  $pe->product->name }} </p>
                            <span>
                                <font color="red">{{  $pe->product->price }} บาท</font>
                                <font color="gray"style='font-size:0.8em; text-decoration: line-through; margin:0%;'>{{$pe->product->actual_price}} บาท</font>
                            </span>
                        </div> 
                        </a> 
                        <div class="box-white d-none d-sm-none d-md-block">
                            <form action="{{ route('cart.add') }}" method="POST">
                                    {!! csrf_field() !!}
                                <input type="hidden" name="event_shop_id" value="{{ $pe->eventShop->id }}">
                                <input type="hidden" name="product_id" value="{{ $pe->product->product_id }}">
                                <input type="hidden" name="price" value="{{  $pe->product->price  }}">
                                <input type="hidden" name="fee" value="{{  $pe->product->fee  }}">
                                <input type="hidden" name="shippping" value="{{  $pe->product->shipping_price  }}">                                  
                                <button type="button" class="box-l btn btn-outline-danger"><i class="fas fa-heart"></i></button>
                                <span style="margin-left:10%;">
                                    จำนวน
                                </span>
                                
                                <input type="number" class="count" name="quantity" value="1" style="width:15%; border:1px solid white;text-align:center;">
                                <button type="submit" class="box-r btn btn-danger"><i class="fas fa-cart-arrow-down"></i></button>
                            </form>          
                        </div>
                    </div> 
                    @endforeach
                </div>

            </div>
                  
        </div>
    </div>{{-- wrapper --}}
       
 </div>{{-- container --}}
    

    <div class="weapper" style="background-color: #fff; padding:3% 5%; ">
            <h4 style="margin-top: 2%; color: #df3433;">สินค้าแนะนำ </h4>
            <h5>PRODUCT & SEGGESTION </h5>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="line-g">
                <div class="line-r">
                    
                </div>
            </div>
    
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <img class="card-img-top  card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_05.png')}}">
                            </div>
                            <div class="col-lg-3 col-md-4  d-none d-sm-none d-md-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_06.jpg')}}">
                            </div>
                            <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_07.png')}}">
                            </div>
                            <div class="col-lg-3 d-none d-md-none d-lg-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_07.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_08.png')}}">
                            </div>
                            <div class="col-lg-3 col-md-4  d-none d-sm-none d-md-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/s_09.jpg')}}">
                            </div>
                            <div class="col-lg-3 col-md-4 d-none d-sm-none d-md-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_11.png')}}">
                            </div>
                            <div class="col-lg-3 d-none d-md-none d-lg-block">
                                <img class="card-img-top card-h" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_11.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    
        </div><!-- weapper pink 4-->
    
</div>
{{-- container --}}

@endsection