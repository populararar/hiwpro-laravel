@extends('layouts.hiwpro')

@section('content')

<style>
        img:hover{
          opacity: 0.5;
         
          transition:ease-in 0.2s;
        }
        </style>
        
              <div class="col-md-12 d-lg-none d-xl-blocke">
                <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/sephora-cover.png')}}">
              </div>
              {{-- <h1>Event Infomation</h1> --}}
              <div class="row" style="margin:1% 0% 5% 0%;">
                  <div class="col-lg-3 d-none d-md-none d-lg-block">
                    <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/in01.jpg')}}">
                  </div>
                  <div class="col-lg-3 d-none d-md-none d-lg-block">
                    <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/in02.jpg')}}">
                  </div>
                  <div class="col-lg-3 d-none d-md-none d-lg-block">
                    <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/in03.jpg')}}">
                  </div>
                  <div class="col-lg-3 d-none d-md-none d-lg-block">
                    <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/in04.jpg')}}">
                  </div>
              </div>
        
        <div class="container">
        <div class="wrapper">
          <div class="row" style="border-bottom: 2px solid #ccc;color:#df3433; margin: 5% 0%; font-weight: bold;">
              <div class="col-12"> 
                  <h3>อีเว้นต์ที่กำลังจะมาถึง</h3>
                </div>
                {{-- <div class="col-4">
                  <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                   </form>
                </div> --}}
                 
          </div>
          
        </div>


<div class="row">
        <div class=" col-md-3 d-none d-md-block d-lg-block">
            <h4>ค้นหาโดย</h4> ชื่ออีเว้น <br>
            <div class="float-left col-sm-12 col-md-4">
                <form method='get' action='/searchEvent' >
                    <input name='q' value='' type="search" placeholder="Search" />
                </form>
            </div>
           
           
        </div> {{-- col-2 --}}
       
        <div class="col-md-9 col-sm-12">
          @if(!empty($events))
      @foreach ($events as $event)
      <div class="row" style="border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;">
              <div class="d-none d-md-block d-lg-block col-md-1 ">
                  <div class="row">
                  <h6 style="border-bottom: 2px solid #df3433;">{{ $event->start_date }}</h6>
                  </div>
      
                  <div class="row">
                      <h6>{{ $event->last_date }}</h6>
                  </div>
              </div>
              <div class="col-sm-12 col-md-4">
              <img style="border-radius: 10%" src="{{ asset('/storage/'.$event->imgPath) }}" class="img-fluid">
              </div>
              <div class="col-sm-12 col-md-7 ">
              <a href="/eventdetail/{{ $event->event_id }}"><h3 style="font-size:1.5em; border-bottom: 1px dotted #cccccc;">{{ $event->eventName }}</h3></a>
                  <i style="color: #df3433;" class="far fa-calendar"></i> 
                  {{ $event->start_date }} - {{ $event->last_date }}
      
                  <p class="text-truncate" style="text-overflow: clip;">
                      {{ $event->detail }}
                  </p>
      
                  <div class="line-p"></div>
              <a href="/eventdetail/{{ $event->event_id }}" style="color: #df3433;">ดูเพิ่มเติม</a>
              </div>
          </div>
          {{-- {{ $event->links() }} --}}
      @endforeach  
      @endif 
      </div>
    </div>  
    
</div>
@endsection