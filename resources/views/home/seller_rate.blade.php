@extends('layouts.hiwpro')

@section('content')
<style>
.pink{
    background-color: #F1D7CD;
    height: 50%;
    z-index: -100;
    /* height: 50%; */
}
.owl-theme .owl-nav [class*=owl-] {
    background: #F44336;
}
</style>
{{-- <div class="pink"></div> --}}
<div class="container">
    <div class="weapper" style="background-color: #fff; padding:3% 5%; ">
        <h4 style="margin-top: 2%; color: #df3433;">อันดับนักหิ้วมือโปร </h4>
        
        {{-- {{dd($user)}} --}}
        <h5>SELLER & PROFESTION </h5>
        <div class="line-g">
            <div class="line-r">
            </div>
        </div>
    <div class="row">
        <div class="col-md-3">
                <div class="card" style="text-align:center;">
                        <img class="card-img-top" src="{{ asset('hiwpro/images/jisoo.jpg')}}">
                        <div class="card-body">
                            <h5 class="card-title">พิมลพัชร เกิดผล</h5>
                            <h1>1</h1>
                            <p class="card-text"> 
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i></p>
                            <a href="#" class="btn btn-danger">ดูเพิ่มเติม</a>
                        </div>
                </div>
        </div>
        
        <div class="col-md-3">
                <div class="card" style="text-align:center;">
                        <img class="card-img-top" src="{{ asset('hiwpro/images/jisoo.jpg')}}">
                        <div class="card-body">
                            <h5 class="card-title">MARK KOFINITOUIN</h5>
                            <h1>2</h1>
                            <p class="card-text"> 
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i></p>
                            <a href="#" class="btn btn-danger">ดูเพิ่มเติม</a>
                        </div>
                </div>
        </div>
        <div class="col-md-3">
                <div class="card" style="text-align:center;">
                        <img class="card-img-top" src="{{ asset('hiwpro/images/jisoo.jpg')}}">
                        <div class="card-body">
                            <h5 class="card-title">MARK KOFINITOUIN</h5>
                            <h1>3</h1>
                            <p class="card-text"> 
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i></p>
                            <a href="#" class="btn btn-danger">ดูเพิ่มเติม</a>
                        </div>
                </div>
        </div>
        <div class="col-md-3">
                <div class="card" style="text-align:center;">
                        <img class="card-img-top" src="{{ asset('hiwpro/images/jisoo.jpg')}}">
                        <div class="card-body">
                            <h5 class="card-title">MARK KOFINITOUIN</h5>
                            <h1>4</h1>
                            <p class="card-text"> 
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i></p>
                            <a href="#" class="btn btn-danger">ดูเพิ่มเติม</a>
                        </div>
                </div>
        </div>
        
    </div>
    <div class="card col-12 mt-5">
        <ul style="padding:5% 8% 0% 8%;" class="list-unstyled">
                        <li class="media">
                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/jisoo2.png')}}">
                            <div class="media-body" style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                <h5 class="mt-0 mb-1">JISOO</h5>
                                หิ้วสำเร็จ 50 ครั้ง <br>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                            </div>
                            <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                <h3 style="color: #df3433"> 1</h3>
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby1.png')}}">
                            <div class="media-body" style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>

                                หิ้วสำเร็จ 42 ครั้ง <br>

                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                            </div>
                            <div class=" float-right" style="border-radius: 50% ; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                <h3 style="color: #df3433">2</h3>
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/lisa.png')}}">
                            <div class="media-body" style="
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                <h5 class="mt-0 mb-1">Lisa BP</h5>

                                หิ้วสำเร็จ 36 ครั้ง <br>

                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star"></i>
                                <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                            </div>
                            <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                <h3 style="color: #df3433"> 3</h3>
                            </div>
                        </li>
                        <li class="media">
                                <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby.png')}}">
                                <div class="media-body" style="
                                                    margin-top: 0%;
                                                    margin-bottom: 2%;
                                                    padding-bottom: 2%;">
                                    <h5 class="mt-0 mb-1">Lisa BP</h5>
    
                                    หิ้วสำเร็จ 36 ครั้ง <br>
    
                                    <i style="color: #df3433" class="fas fa-star"></i>
                                    <i style="color: #df3433" class="fas fa-star"></i>
                                    <i style="color: #df3433" class="fas fa-star"></i>
                                    <i style="color: #df3433" class="fas fa-star"></i>
                                    <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                </div>
                                <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                    <h3 style="color: #df3433"> 4</h3>
                                </div>
                            </li>
                            <li class="media">
                                    <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby4.png')}}">
                                    <div class="media-body" style="
                                                        margin-top: 0%;
                                                        margin-bottom: 2%;
                                                        padding-bottom: 2%;">
                                        <h5 class="mt-0 mb-1">Lisa BP</h5>
        
                                        หิ้วสำเร็จ 36 ครั้ง <br>
        
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                    </div>
                                    <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                        <h3 style="color: #df3433">5</h3>
                                    </div>
                                </li>
                                <li class="media">
                                        <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby3.png')}}">
                                        <div class="media-body" style="
                                                            margin-top: 0%;
                                                            margin-bottom: 2%;
                                                            padding-bottom: 2%;">
                                            <h5 class="mt-0 mb-1">Lisa BP</h5>
            
                                            หิ้วสำเร็จ 36 ครั้ง <br>
            
                                            <i style="color: #df3433" class="fas fa-star"></i>
                                            <i style="color: #df3433" class="fas fa-star"></i>
                                            <i style="color: #df3433" class="fas fa-star"></i>
                                            <i style="color: #df3433" class="fas fa-star"></i>
                                            <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                        </div>
                                        <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                            <h3 style="color: #df3433">6</h3>
                                        </div>
                                    </li>
                                    <li class="media">
                                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby2.png')}}">
                                            <div class="media-body" style="
                                                                margin-top: 0%;
                                                                margin-bottom: 2%;
                                                                padding-bottom: 2%;">
                                                <h5 class="mt-0 mb-1">Lisa BP</h5>
                
                                                หิ้วสำเร็จ 36 ครั้ง <br>
                
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                                <h3 style="color: #df3433">7</h3>
                                            </div>
                                        </li>
                       

                    </ul>
        
    </div>
</div>
    @php
         $user = Auth::user();
    @endphp
  
    <div class="weapper" style="background-color: #fff; padding:3% 5%; ">
            <h4 style="margin-top: 2%; color: #df3433;">นักหิ้วหน้าใหม่ </h4>
           
            {{-- {{dd($user)}} --}}
            <h5>SELLER & SEGGESTION </h5>
            <div class="line-g">
                <div class="line-r">
                </div>
            </div>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
      
            <div class="owl-carousel owl-theme">
                
                @foreach ($profile as $item)
                    @if ($item->national_img)
                        <div class="item card-n">
                            <img src="{{ asset('/storage/'.$item->img) }}" class="img-fluid" >
                            <div class="middle"><div class="text">{{$item->tel}}</div></div>
                        </div>
                    @endif
                @endforeach
            </div>
    
    </div>
</div>


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
</script>
   
@endsection