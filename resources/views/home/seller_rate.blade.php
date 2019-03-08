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
#wrap {
    overflow: hidden;
    position: relative;
    float: left;
}

#wrap img.fake {
    float: left;
    visibility: hidden;
    width: auto;
}
#img_wrap {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
#img_wrap img.normal {
    width: 50%;
}​
/* 
 */
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
        @foreach ($reviewsTopFour as $key => $item)
        <div class="col-md-3">
                <div class="card" style="text-align:center;">
                       
                        <div class="card-body">
                           {{-- {{ dd($item->seller->profile->img)}} --}}

                           @if (!empty($item->seller->profile))
                           <img class="card-img-top" src="{{ asset('storage'.$item->seller->profile->img)}}">
                           @else
                           <img class="card-img-top" src="">
                           @endif
                            
                            <h5 class="card-title">{{$item->seller->name}}</h5>
                            <h1>{{$key+1}}</h1>
                            <p class="card-text" style="color: #df3433" > 
                                    @if ($item->avg_score == 0)
                                    ยังไม่มีคะแนน
                                    @elseif($item->avg_score > 0 && $item->avg_score < 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->avg_score >= 0.5 && $item->avg_score <= 1)
                                    <i class="fas fa-star"></i>
                                    @elseif($item->avg_score > 1 && $item->avg_score <= 1.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->avg_score > 1.5 && $item->avg_score <= 2)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @elseif($item->avg_score > 2 && $item->avg_score <= 2.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->avg_score > 2.5 && $item->avg_score <= 3)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @elseif($item->avg_score >= 3 && $item->avg_score <= 3.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif($item->avg_score >= 3.5 && $item->avg_score <= 4)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @elseif($item->avg_score >= 4 && $item->avg_score <= 4.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @endif  
                            </p>
                            <a href="{!! route('home.seller_detail', ['userId' => $item->seller->id]) !!}" class="btn btn-danger">ดูเพิ่มเติม</a>
                        </div>
                </div>
        </div>
        @endforeach
        
        
       
        
    </div>
    <div class="card col-12 mt-5">
        <ul style="padding:5% 8% 0% 8%;" class="list-unstyled">
            @foreach ($reviewsTopTen as $key => $item)
                <li class="media">
                    @if (!empty($item->seller->profile))
                        <img class="mr-3 rounded-circle" width="80px" src="{{ asset('storage'.$item->seller->profile->img)}}">
                    @else
                        <img class="mr-3 rounded-circle" width="80px" src="{{ asset('hiwpro/images/bobby.png')}}">
                    @endif

                    
                    <div class="media-body" style="border-bottom: 2px dotted #ccc;
                                        margin-top: 0%;
                                        margin-bottom: 2%;
                                        padding-bottom: 2%;">
                        <a href="{!! route('home.seller_detail', ['userId' => $item->seller->id]) !!}">
                            <h5 class="mt-0 mb-1">{{$item->seller->name}}</h5>
                        </a>
                        หิ้วสำเร็จ {{$item->count}} ครั้ง <br>
                        <p class="card-text" style="color: #df3433" > 
                            @if ($item->avg_score == 0)
                            ยังไม่มีคะแนน
                            @elseif($item->avg_score > 0 && $item->avg_score < 0.5)
                            <i class="fas fa-star-half-alt"></i>
                            @elseif($item->avg_score >= 0.5 && $item->avg_score <= 1)
                            <i class="fas fa-star"></i>
                            @elseif($item->avg_score > 1 && $item->avg_score <= 1.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            @elseif($item->avg_score > 1.5 && $item->avg_score <= 2)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($item->avg_score > 2 && $item->avg_score <= 2.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            @elseif($item->avg_score > 2.5 && $item->avg_score <= 3)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($item->avg_score >= 3 && $item->avg_score <= 3.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            @elseif($item->avg_score >= 3.5 && $item->avg_score <= 4)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($item->avg_score >= 4 && $item->avg_score <= 4.5)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            @else
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @endif  
                    </p>
                    </div>
                    <div class=" float-right" style="border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                        <h3 style="color: #df3433">{{$key+1}}</h3>
                    </div>
                </li>
            @endforeach
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
                
                @foreach ($newSeller as $item)
                {{-- <div class="text">{{$item->user->name}}</div> --}}
               
                @foreach ($item->profile as $profile)
                {{-- {{dd($profile)}} --}}
                @endforeach
                    @if ($profile->national_img)
                        <div class="item card-n">
                            <img src="{{ asset('/storage/'.$profile->img) }}" class="img-fluid" >
                                <div class="middle"><div class="text" style="padding:0;">{{$item->user->name}}</div></div>
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