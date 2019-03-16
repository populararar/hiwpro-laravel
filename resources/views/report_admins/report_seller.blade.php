@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
<style>
.btn-header{
        width:150px; 
        margin-left:2%;
        background-color: white;
        color: #999; 
}
.btn-header:hover{
        width:150px; 
        margin-left:2%;
        background-color: #3c8dbc;
        border-color: #367fa9;
        color: #FFF !important;
}
/* ------------------------------- */
.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
  margin-bottom: 1.6%;
  background: #fff;
  line-height: 1.4;
  font-family: 'Kanit';
  border-radius: 5px;
  overflow: hidden;
  z-index: 0;
}
.blog-card a {
  color: inherit;
}
.blog-card a:hover {
  color: #5ad67d;
}
.blog-card:hover .photo {
  -webkit-transform: scale(1.3) rotate(3deg);
          transform: scale(1.3) rotate(3deg);
}
.blog-card .meta {
  position: relative;
  z-index: 0;
  height: 200px;
}
.blog-card .photo {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-size: cover;
  background-position: center;
  transition: -webkit-transform .2s;
  transition: transform .2s;
  transition: transform .2s, -webkit-transform .2s;
}
.blog-card .details,
.blog-card .details ul {
  margin: auto;
  padding: 0;
  list-style: none;
}
.blog-card .details {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -100%;
  margin: auto;
  transition: left .2s;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 10px;
  width: 100%;
  font-size: .9rem;
}
.blog-card .details a {
  -webkit-text-decoration: dotted underline;
          text-decoration: dotted underline;
}
.blog-card .details ul li {
  display: inline-block;
}
.blog-card .details .author:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f007";
}
.blog-card .details .date:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f133";
}
.blog-card .details .tags ul:before {
  font-family: FontAwesome;
  content: "\f02b";
  margin-right: 10px;
}
.blog-card .details .tags li {
  margin-right: 2px;
}
.blog-card .details .tags li:first-child {
  margin-left: -4px;
}
.blog-card .description {
  padding: 1rem;
  background: #fff;
  position: relative;
  z-index: 1;
}
.blog-card .description h1,
.blog-card .description h2 {
  font-family: 'Kanit';
}
.blog-card .description h1 {
  line-height: 1;
  margin: 0;
  font-size: 1.7rem;
}
.blog-card .description h2 {
  font-size: 1rem;
  font-weight: 300;
  text-transform: uppercase;
  color: #a2a2a2;
  margin-top: 5px;
}
.blog-card .description .read-more {
  text-align: right;
}
.blog-card .description .read-more a {
  color: #5ad67d;
  display: inline-block;
  position: relative;
}
.blog-card .description .read-more a:after {
  content: "\f061";
  font-family: FontAwesome;
  margin-left: -10px;
  opacity: 0;
  vertical-align: middle;
  transition: margin .3s, opacity .3s;
}
.blog-card .description .read-more a:hover:after {
  margin-left: 5px;
  opacity: 1;
}
.blog-card p {
  position: relative;
  margin: 1rem 0 0;
}
.blog-card p:first-of-type {
  margin-top: 1.25rem;
}
.blog-card p:first-of-type:before {
  content: "";
  position: absolute;
  height: 5px;
  background: #5ad67d;
  width: 35px;
  top: -0.75rem;
  border-radius: 3px;
}
.blog-card:hover .details {
  left: 0%;
}
@media (min-width: 640px) {
  .blog-card {
    flex-direction: row;
    max-width: 700px;
  }
  .blog-card .meta {
    flex-basis: 40%;
    height: auto;
  }
  .blog-card .description {
    flex-basis: 60%;
  }
  .blog-card .description:before {
    -webkit-transform: skewX(-3deg);
            transform: skewX(-3deg);
    content: "";
    background: #fff;
    width: 30px;
    position: absolute;
    left: -10px;
    top: 0;
    bottom: 0;
    z-index: -1;
  }
  .blog-card.alt {
    flex-direction: row-reverse;
  }
  .blog-card.alt .description:before {
    left: inherit;
    right: -10px;
    -webkit-transform: skew(3deg);
            transform: skew(3deg);
  }
  .blog-card.alt .details {
    padding-left: 25px;
  }
}

/* --------------------------------------------------- */

* {
  box-sizing: border-box;
}

</style>
@section('content')
<section class="content-header" style="text-align:center;">
<ul class="menu">
    <li><a href="{!! route('reportAdmins.index') !!}" >ข้อมูลรายได้</a></li>
    <li><a href="{!! route('reportAdmins.orderReport') !!}">ข้อมูลการสั่งซื้อ</a></li>
    <li><a href="{!! route('reportAdmins.orderSeller') !!}" class="active">ข้อมูลแม่ค้า</a></li>
    <li><a href="{!! route('reportAdmins.orderSeller') !!}" >ข้อมูลลูกค้า</a></li>
    <li class="slider"></li>
</ul>
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
            <div class="box box-danger">
                <div class="box-body">
                        <div class="row">
                            <div class="col-sm-3">
                                    <div
                                        class="bs-callout bs-callout-info"
                                        id="callout-btn-group-tooltips">
                                        <h4>
                                                {{ $stats['countSeller'] }}
                                        </h4>
                                        <p>
                                                นักหิ้ว
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div
                                        class="bs-callout bs-callout-info"
                                        id="callout-btn-group-tooltips">
                                        <h4>
                                                {{ $stats['countCustomer'] }}
                                        </h4>
                                        <p>
                                                ลูกค้า
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div
                                        class="bs-callout bs-callout-info"
                                        id="callout-btn-group-tooltips">
                                        <h4>  
                                          {{ $stats['countOrder4'] }}
                                          {{-- {{dd($countIncome)}} --}}
                                          
                                        </h4>
                                        <p>
                                                ได้รับสินค้า
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div
                                        class="bs-callout bs-callout-info"
                                        id="callout-btn-group-tooltips">
                                        <h4>
                                            {{$countIncome->income}}
                                        </h4>
                                        <p>
                                                รายได้ทั้งหมด
                                        </p>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        
            <div class="clearfix"></div>

            <div class="box box-primary" style="text-align:center;">
                    <h2> TOP 5 อีเวนต์ที่คนมาหิ้วด้วยมากที่สุด</h2>
                      <div class="mx-auto" >
                          <form method="GET" action="{{ route('reportSellers.index') }}">
                              <input type="date" name="start">
                              <input type="date" name="end">
                              <button class="btn btn-danger" type="submit">search</button>
                              <button type="button" class="btn btn-white" onclick="javascript:location.href='{{ route('reportSellers.index') }}'">clear</button>
                          </form>
                      </div>
                      
                      <div class="col-sm-12">
                        @foreach ($eventShopTopFive as $eventShop)
                      {{--   {{$eventShop->shopName->name}}
                        {{$eventShop->shopName->detail}} 
                        {{$eventShop->counted}}--}}
                            {{-- {{dd($eventShop) }} --}}
                        @endforeach
                        <div id="chart-div"></div>
                          {!! $lava->render('DonutChart', 'IMDB', 'chart-div') !!}
                      </div>
                         
                        
                      <div class="box-body">
                              {{-- @include('report_sellers.table') --}}
                      </div>
                  </div>
          
          
                  <div class="box box-primary" style="text-align:center;">
                      <h2>TOP 5 ช่วงที่คนมารับหิ้วมากที่สุด</h2>
                        <div class="mx-auto" >
                            <form method="GET" action="{{ route('reportAdmins.orderSeller') }}">
                                <input type="date" name="start">
                                <input type="date" name="end">
                                <button class="btn btn-danger" type="submit">search</button>
                                <button type="button" class="btn btn-white" onclick="javascript:location.href='{{ route('reportSellers.index') }}'">clear</button>
                            </form>
                        </div>
                        
                        <div class="col-sm-12">
                            @foreach ($topFiveHotMonth as $eventShop)

                           {{-- <br>{{$eventShop->year}}
                            {{$eventShop->month}} 
                            {{$eventShop->counted}}<br>
                             {{dd($eventShop) }} --}}
                            @endforeach
                            <div id="perf_div"></div>
                                {!! $lava->render('ColumnChart', 'TopFiveHotMonth', 'perf_div') !!}
                        </div>
                       
                           
                          
                        <div class="box-body">
                                {{-- @include('report_sellers.table') --}}
                        </div>
                    </div>

           

</div>
<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
        $(this).tab('show');
        });
    });
</script>
@endsection