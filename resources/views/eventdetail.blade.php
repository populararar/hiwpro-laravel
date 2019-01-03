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
    box-sizing: border-box;
    margin: 1% 1%;
    padding:0%;
    cursor: pointer;    
}
.card-in{
    padding: 0% 5% 5% 5%;
}
.cardp:hover{
    border: solid 1px #ccc;
}
body{
    background: #f3f3f4;
}
.col-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 22%;
}
.part{
    margin:5% 0%;
}
</style>

<div class="container" >
   <div class="weapper" style="background-color: #F1D7CD; padding:3% 5%; border-top: solid 5px #df3433;">
            <h4 style=" color: #df3433;">สินค้าแนะนำ </h4>
            <h5>PRODUCT & SEGGESTION </h5>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_08.png')}}"
                                   >
                            </div>
                            <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_09.png')}}"
                                   >
                            </div>
                            <div class="col-lg-4 d-none d-md-none d-lg-block">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_11.png')}}"
                                   >
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_07.png')}}"
                                   >
                            </div>
                            <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_06.png')}}"
                                   >
                            </div>
                            <div class="col-lg-4 d-none d-md-none d-lg-block">
                                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_05.png')}}"
                                   >
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


    <div class="wrapper">
           
         <div class="row part" >
             <div class="col-7">
                <h4 style="color:#df3433; text-align:center;">Event : {{ $event->eventName }}</h4>  
             <p style="color:#df3433; text-align:center;">เริ่มวันที่ {{ $event->startDate }} - {{ $event->lastDate}} <br><br><br>
             {{ $event->detail}}</p>
             </div>
             <div class="col-5">
                <img class='card-img-top' style='border-radius: 10%' src='{{ asset('/storage/'.$event->imgPath) }}'>
             </div>
             
         </div>  
    </div>
    
    {{-- style='border-radius: 10%' --}}

    <div class="wrapper">
        <div class="row" style="border-buttom:1px solid  #ccc;">
            <div class="col-2"></div>
            <div class="col-10">
                <h4 style="color:#df3433; line-height : -1;">{{ $event->eventName }}</h4><br>
                Event / {{ $event->eventName }}
            </div>
                
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="row">
                    
                    @foreach ($productEvents as $pe) 
                    <a  href="{{  route('event.detail.product', ['id' => $pe->product_id, 'event_shop_id' => $pe->event_shop_id]) }}" style='color: #df3433;'> 
                    <div class="col-3 cardp">
                            <img class='card-img-top' src="{{ asset('/storage/'.$pe->product->image_product_id) }}">
                       
                        <div class="card-in">
                            <p style='color:red; font-size:1em;line-height : 2;margin:0%;'> {{  $pe->product->name }} </p>
                            <p style='color:red; font-size:1em; margin:0%;'> {{  $pe->product->price }} 
                            <p style='color:gray; font-size:0.8em; text-decoration: line-through; margin:0%;'> {{  $pe->product->actual_price }} </p>
                            <button type="button" class="btn btn-outline-danger"><i class="fas fa-heart"></i>save</button>
                           
                   
                        </div> 
                     </a>
                    </div>
                    
        {{-- <div class='card01 col-xs-12  col-sm-12 col-md-3' style='margin:0%; float:left;'>
            <img class='card-img-top' style='border-radius: 10%' src='{{ asset('/storage/'.$pe->product->img) }}'>
            <div class='card-body'>
                {{ $event->name}}<br>
                <p class='text-truncate' style='text-overflow: clip; font-size:0.8em;'>{{ $event->detail }}</p>
                <p style='text-decoration: line-through;'>
                    {{ $event->actual_price }} </p>
                <p style='color:red; font-size:1.4em;'> {{ $event->sale_price }} </p>
                <a href='{{  route('event.detail.product', ['id' => $event->product_id]) }}' style='color: #df3433;'>ดูเพิ่มเติม</a>
            </div>
        </div> --}}
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    {{-- wrapper --}}

    
</div>
{{-- container --}}

@endsection