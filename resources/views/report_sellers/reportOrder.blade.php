@extends('layouts.app')
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
@section('content')
<style>
.main {
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 20px;
}
h4{
    font-family: "Kanit", sans-serif;
}

.heading-1 {
  display: block;
  font-family: "Kanit", sans-serif;
  font-size: 45px;
  font-weight: 300;
  text-transform: uppercase;
}

.container {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  margin: 60px auto;
  width: 66%;
}
@media only screen and (max-width: 600px) {
  .container {
    width: 80%;
  }
}
@media only screen and (max-width: 320px) {
  .container {
    width: 96%;
  }
}

.card {
  align-items: center;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
  display: flex;
  flex-direction: column;
  height: 400px;
  justify-content: space-around;
  margin: 10px;
  padding: 20px;
  transition: all .3s ease-in-out;
  width: 280px;
}
.card:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
  transform: scale(1.05);
}
@media only screen and (max-width: 600px) {
  .card {
    box-shadow: none;
  }
  .card:hover {
    box-shadow: none;
    transform: none;
  }
}

.card--split-8 {
  background-image: linear-gradient(to right bottom, #ffd84f 50%, #fe4a49 50%);
}
.card__pic {
  background-color: #fff;
  border-radius: 50%;
  height: 180px;
  position: relative;
  top: 3%;
  width: 180px;
}

.card__pic--box {
  border-radius: 3px;
  width: 280px;
}
.card__placeholder {
  color: #333;
  font-family: "Kanit", sans-serif;
  font-size: 30px;
  left: 50%;
  position: absolute;
  text-align: center;
  top: 50%;
  transform: translate(-50%, -50%);
  text-transform: uppercase;
}
.card__headline {
  color: #fff;
  font-family: "Kanit", sans-serif;
  font-size: 18px;
  letter-spacing: 5px;
  text-transform: uppercase;
}
.card__headline--centered {
  text-align: center;
}
.card__subheading {
  color: #fff;
  font-family: "Kanit", sans-serif;
  font-size: 14px;
  text-transform: uppercase;
  transform: translateY(-40px);
}
.card__content {
  align-items: center;
  background-color: #fff;
  border-radius: 3px;
  display: flex;
  flex-direction: column;
  height: 100px;
  justify-content: center;
  overflow: hidden;
  padding: 10px;
  width: 260px;
}
.card__paragraph {
  font-family: "Kanit", sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
  line-height: 1.5;
}
/* ------------------------------ */

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

</style>
{{-- <section class="content-header" style="text-align:center;">
  <a href="{!! route('reportAdmins.orderReport') !!}" class="btn btn-primary" style="width:150px; margin-left:2%;"><h4>สรุปรายได้</h4></a>
  <a href="{!! route('reportAdmins.orderReport') !!}" class="btn btn-header "><h4> 
    สรุปอีเวนต์ที่คนมาหิ้วด้วยมากที่สุด</h4></a> 
  <a href="{!! route('reportAdmins.orderReport') !!}" class="btn btn-header "><h4> 
    สรุปอีเวนต์</h4></a>
</section> --}}
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="text-center">
        
        </div>

        <div class="box box-primary" style="text-align:center;">
            <h2>TOP 5 อีเวนต์ที่มีคนมาสั่งซื้อสินค้ามากที่สุด</h2>
              <div class="mx-auto" >
                  <form method="GET" action="{{ route('reportSellers.index') }}">
                      <input type="date" name="start">
                      <input type="date" name="end">
                      <button class="btn btn-danger" type="submit">search</button>
                      <button type="button" class="btn btn-white" onclick="javascript:location.href='{{ route('reportSellers.index') }}'">clear</button>
                  </form>
              </div>
              
              <div class="col-sm-12">
                @foreach ($topFiveOrder as $key => $eventShop)
                @php
                  $key++;
                @endphp
                {{-- {{dd($eventShop->counted)}} --}}

                  @if (!empty($eventShop->shopName))
                     <br>
                  @if ($key%2 != 1)
                  <div class="blog-card">
                      <div class="meta">
                        <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)">
                          <img width="300px"
                          src="{{ asset('/storage/'.$eventShop->eventName->imgPath) }}" class="img-fluid">
                        </div>
                        <ul class="details">
                          <li class="author"><a href="#">{{$eventShop->shopName->name}}</a></li>
                          <li class="date">{{$eventShop->eventName->event_exp}}</li>
                      
                        </ul>
                      </div>
                      <div class="description">
                        <h1>{{$eventShop->eventName->eventName}}</h1>
                        <h2>{{$eventShop->shopName->location->location_name}}</h2>
                        <p>{{$eventShop->shopName->detail}}</p>
                        <p></p>
                        <p class="pull-left">ประเภทอีเวนต์: {{$eventShop->eventName->event_type}}:{{$eventShop->eventName->income}}</p>
                        <p class="read-more">
                            <a href="#">count: {{$eventShop->counted}}</a>
                        </p>
                      </div>
                    </div>
                  @else
                  <div class="blog-card alt">
                      <div class="meta">
                        <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)">
                          <img width="300px"
                          src="{{ asset('/storage/'.$eventShop->eventName->imgPath) }}" class="img-fluid"></div>
                        <ul class="details">
                          <li class="author"><a href="#">{{$eventShop->shopName->name}}</a></li>
                          <li class="date">{{$eventShop->eventName->event_exp}}</li>
                        
                        </ul>
                      </div>
                      <div class="description">
                        <h1>{{$eventShop->eventName->eventName}}</h1>
                        <h2>{{$eventShop->shopName->location->location_name}}</h2>
                        <p>{{$eventShop->shopName->detail}}</p>
                        <p class="pull-right">ประเภทอีเวนต์: {{$eventShop->eventName->event_type}}:{{$eventShop->eventName->income}}</p>
                        <p class="read-more">
                          <br>
                          <br>
                            <a href="#">count: {{$eventShop->counted}}</a>
                        </p>
                      </div>
                    </div>
                  @endif
                @endif
                 
                @endforeach
              </div>
                 
                
              <div class="box-body">
                      {{-- @include('report_sellers.table') --}}
              </div>
          </div>
    </div>
@endsection

