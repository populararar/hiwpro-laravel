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
    <h1 class="pull-left" style="font-family:'Kanit';">สินค้าที่ต้องซื้อ</h1><br>
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
<div class="box box-primary">
    <main class="main mx-auto">
        <h3 style="font-family:Kanit;  text-align:center;" ><b>ร้าน </b>{{ $shop->name}}</h3>
        
        <div class="box" style="border-top: 1px solid #d2d6de !important ; width:100%;padding-left:30px;"> 
                <b> ชื่ออีเว้นต์ : </b>{{$event->eventName}} 
                <br>สถานที่ : </b>
                <div class="row mx-auto">
            
                    <div class="card card--split-8"style="float:left;">
                        <div class="card__pic">
                            <span class="card__placeholder">
                                <img width="150px" class="circle" style="border-radius: 10%"
                                src="{{ asset('/storage/'.$product->image_product_id) }}" class="img-fluid">
                            </span>
                        </div>
                        <h2 class="card__headline"></h2>
                        <div class="card__content">
                            <p class="card__paragraph">
                            @php
                                $pId =  $product->product_id;
                                
                            @endphp
                            <p>ชื่อสินค้า<br>{{  $product->name  }}</p>
                            <p> ราคา  : {{ $product->price }} </p> 
                            
                        </div>
                    </div>
                
                </div>
            
        </div>
    </main>
</div> 

    <div class="clearfix"></div>

    <div class="box box-primary">
        <div class="box-body">
            <div class="col-sm-12">
                    <input type="hidden" name="form-detail" value="true" />
                    @foreach($orderDetail as $key => $item)
                         <form action='{{ route('orderSeller.productUpdate') }}' method="POST" id="form-{{$key}}" name="form-{{$key}}">
                    <div class="form-inline" style="padding:5px">
                        {{-- {{dd($key,$item->id)}} --}}
                        @csrf
                        <input
                            type="hidden"
                            name="detail_id"
                            value="{{ $item->id }}"
                        />

                        <input
                            type="hidden"
                            name="header_id"
                            value="{{ $item->order_header_id }}"
                        />
                        <a href="{!! route('orderSellers.show', [$item->order_header_id]) !!}" >
                                {{ $item->orderHeader->order_number}}</a>
                        
                        <div class="form-group">
                            <label for="product_name">{{ $item->customer->name }}</label>
                        </div>
    
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $item->product->name }}"
                                readonly
                            />
                        </div>
                
                        <div class="form-group" >
                            <label for="required_amount">Required Qty</label>
                            <input
                                type="number"
                                class="form-control"
                                value="{{ $item->qrt }}"
                                readonly
                            />
                        </div>
    
                        @if($item->seller_actual_status == 0)
                        <div class="form-group">
                            <label for="required_amount">Actual Qty</label>
                            <input
                                type="number"
                                name="seller_actual_qty"
                                class="form-control"
                                value="{{ $item->seller_actual_qty }}"
                            />
                        </div>
                        @else
                        <div class="form-group">
                            <label for="required_amount">Actual Qty</label>
                            <input
                                type="number"
                                class="form-control"
                                value="{{  $item->seller_actual_qty }}"
                                disabled
                            />
                        </div>
                        @endif

                        <div class="form-group">
                            @php
                                $disable = $orderDetail->first()->seller_actual_status != 0 ? true : false
                            @endphp
                            {!! Form::submit('Save', ['form' => 'form-'.$key,'class' => 'btn btn-primary' , 'disabled'=> $disable]) !!} 
                        </div>
    
                    </div>
                </form>
                    @endforeach
                    <!-- Submit Field -->
            </div>
                
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="text-center">
    
</div>
@endsection