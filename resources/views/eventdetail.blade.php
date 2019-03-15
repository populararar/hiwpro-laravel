@extends('layouts.hiwpro')

@section('content') 
<style>
img:hover{
    opacity: 0.5;
    transition:ease-in 0.2s;
}
.cardp{
    width: -10% !important;
    /* background: #fff; */
    margin: 1% 1%;
    padding:0%;
    cursor: pointer;  
    overflow: hidden !important;
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
    top: 0%;
} 
.card-in{
    padding: 5%;
    text-align: center;
}
p.card-in{
    color:#df3433; 
    
    line-height :1.2;
    margin:2%;
}
/* 
.col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 22%;
} */
.col-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 22%;
    float: left;
    height: 350px;
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

@media screen and (max-width: 420px) { 
    .p{
        font-size: 14px;
    }
    .pro-sm{
        display: visible;
    }
   
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
            <div class="col-md-10">
                <div class="row d-none d-sm-none d-md-block d-lg-block" style="margin:auto;">
                    @foreach ($productEvents as $pe) 
                    <a href="{{  route('event.detail.product', ['id' => $pe->product_id, 'event_shop_id' => $pe->event_shop_id]) }}" style='color: #df3433;'> 
                    <div class="col-3 cardp">
                        <img class='card-img-top' src="{{ asset('/storage/'.$pe->product->image_product_id) }}">
                        {{-- text-truncate --}}
                        <div class="card-in" >
                            <p > {{  $pe->product->name }} </p>
                            <span>
                                <font color="red">{{ number_format($pe->product->price)  }} บาท</font>
                                <font color="gray"style='font-size:0.8em; text-decoration: line-through; margin:0%;'>{{number_format($pe->product->actual_price)}} บาท</font>
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
            <div class="container">
                <div class="row pro-sm d-md-none d-lg-none d-xl-none">
                    @foreach ($productEvents as $pe)
                <a  href="{{  route('event.detail.product', ['id' => $pe->product_id, 'event_shop_id' => $pe->event_shop_id]) }}" style='color: #df3433;'> 
                <div class="col-6">
                    <img class='card-img-top' src="{{ asset('/storage/'.$pe->product->image_product_id) }}"></a>
                    <div class="card-in">
                        <p > {{  $pe->product->name }} </p>
                        <span>
                            <font color="red">{{  number_format($pe->product->price) }} บาท</font>
                            <font color="gray"style='font-size:0.8em; text-decoration: line-through; margin:0%;'>{{ number_format($pe->product->actual_price)}} บาท</font>
                        </span>
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
    
            <div class="owl-carousel owl-theme">
                @foreach ($eventRecomment as $eventItem)
                    
                    @foreach ($eventItem->recomment as $recomment)
                         <div class="item card-n">
                            {{-- {{dd($recomment->event_shop_id)}} --}}
                                {{-- $recomment->product->image_product_id --}}
                        <a href="{{ route('event.detail.product', ['id' => $recomment->product->product_id, 'event_shop_id' => $recomment->event_shop_id]) }}" 
                            style="color: #df3433;font-family:'Kanit' font-weight:light;"> 
                            <img src="{{ asset('/storage/'.$recomment->product->image_product_id) }}" class="img-fluid" >
                            <div class="middle"><div class="text">{{$recomment->product->name}}</div></div>
                        </a>
                        </div>
                   @endforeach
                @endforeach
            </div>
    
        </div><!-- weapper pink 4-->
    
</div>
{{-- container --}}


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
                   
                   
                    <script>
                           
                
                           $('.owl-carousel').owlCarousel({
                                loop:true,
                                margin:10,
                                nav:true,
                                responsive:{
                                    0:{
                                        items:1
                                    },
                                    600:{
                                        items:3
                                    },
                                    1000:{
                                        items:5
                                    }
                                }
                            })
                       $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

                            var href = $(e.target).attr('href');
                            var $curr = $(".process-model  a[href='" + href + "']").parent();

                            $('.process-model li').removeClass();

                            $curr.addClass("active");
                            $curr.prevAll().addClass("visited");
                        });
           
 

        
        </script>

@endsection