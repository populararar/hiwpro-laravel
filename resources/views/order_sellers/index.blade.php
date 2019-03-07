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

    .line-g{
        width: 100%;
        height: 1px;
        background-color: #606060;
        margin: 3% 0%;
    }
    .line-r{
        width: 30%;
        height: 2px;
        position: relative;
        background-color: #cf2132;
    }
    
    </style>

    <section class="content-header">
        <h1 class="pull-left" style="font-family:'Kanit';">My Orders</h1><br>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('orderSellers.create') !!}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="alert alert-warning " role="alert">
            <strong>คำเตือน!</strong> หากใส่เลขแทรคและอัปเดทสินค้าแล้วจะไม่สามารถทำรายการอีกได้ กรุณาตรวจสอบ
            ความเรียบร้อยก่อนอับเดทเลขพัสดุ
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="clearfix"></div>

        <div class="box box-danger">
            <div class="box-body">
                    <div class="row">
                        <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{$countOrder}}
                                    </h4>
                                    <p>
                                            ยังไม่ส่ง
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{$countPrepared}} 
                                    </h4>
                                    <p>
                                            ส่งแล้ว
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{$countFinish}}
                                    </h4>
                                    <p>
                                            ยอดที่หิ้วได้ทั้งหมด
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{$countSum}}
                                    </h4>
                                    <p>
                                            จำนวนชิ้น
                                    </p>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <main class="main">
                <h1 style="font-family:Kanit;" >รายการที่ต้องซื้อ</h1>
                <div class="box" style="width:100%;padding-left:30px;"> 
                    
                    @foreach ($orderGroup as $key => $group)
                    @php
                       $a =  collect($group)->first();
                    @endphp
                    <div class="line-g">
                        <div class="line-r">
                        </div>
                    </div>
                      {{-- {{dd($a['event_shop']->shop->name,$a['event_shop']->shop_location->location_name)}} --}}
                      <b> ชื่ออีเว้นต์ : </b>{{ $a['event_shop']->shop->name }}<b>
                      <br>สถานที่ : </b>{{$a['event_shop']->shop_location->location_name}}</p>
                      <div class="row">
                      @foreach ( $group as $item)
                          <div class="card card--split-8"style="float:left;">
                              <div class="card__pic">
                                  <span class="card__placeholder">
                                      <img width="150px" class="circle" style="border-radius: 10%"
                                      src="{{ asset('/storage/'.$item['product']->image_product_id) }}" class="img-fluid">
                                  </span>
                              </div>
                              <h2 class="card__headline"></h2>
                              <div class="card__content">
                                  <p class="card__paragraph">
                                    @php
                                        $pId =  $item['product']->product_id;
                                        $eventShopId = $item['event_shop_id'];
                                    @endphp
                                  <a href="{{ route('orderSeller.product',[$pId,$eventShopId]) }}">
                                  <p>ชื่อสินค้า<br>{{  $item['product']->name  }}</p>
                                  </a> 
                                      <p>จำนวน  : {{ $item['qrt'] }} </p> 
                                  </p>
                              </div>
                          </div>
                      @endforeach
                      </div>
                    @endforeach
                </div>
                </main>
        </div>

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                    @include('order_sellers.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

