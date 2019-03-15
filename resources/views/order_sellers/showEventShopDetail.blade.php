@extends('layouts.app')
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
@section('content')
<style>

.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
  margin-bottom: 1.6%;
  background: #fff;
  line-height: 1.4;
  font-family: sans-serif;
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
  font-family: Poppins, sans-serif;
}
.blog-card .description h1 {
  line-height: 1;
  margin: 0;
  font-size: 1.7rem;
}
.blog-card .description h2 {
  font-family: 'Kanit';
  font-size: 1.5rem;
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
    <div class="alert alert-danger " role="alert">
        <strong>คำเตือน!</strong> หากอัปเดทสินค้าแล้วจะไม่สามารถทำรายการอีกได้ กรุณาตรวจสอบความเรียบร้อยก่อนอับเดทเลขพัสดุ
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
<div class="box box-primary" style="padding-bottom:2%;">
    <main class="main mx-auto">
        <h3 style="font-family:Kanit;  text-align:center;" ><b>ร้าน </b>{{ $shop->name}}</h3>
    </main>

    <div class="blog-card" >
        <div class="meta">
          <div class="photo"  style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)">
            <img width="300px"
            src="{{ asset('/storage/'.$product->image_product_id) }}" class="img-fluid"></div>
          <ul class="details">
            <li class="author"><a href="#"><h3>ชื่อสินค้า<br>{{  $product->name  }}</h3></a></li>
            <li class="date">Aug. 24, 2015</li>
            
          </ul>
        </div>
        <div class="description"><br>
          <h3><p>ชื่อสินค้า<br>{{  $product->name  }}</p></h3>
          <h2>ราคา  : {{ number_format($product->price) }} บาท</h2>
          <p style="font-family:'Kanit';">{{ $product->productdetail }} </p>
          <p class="read-more">
            <a href="#" style="font-family:'Kanit';" >สินค้าที่ต้องซื้อ</a>
          </p>
        </div>
    </div>
     
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
                        <a href="{!! route('orderSellers.show', [$item->order_header_id]) !!}"
                            style="color:#cf2132;
                                  font-size:1.3em;" >
                                {{ $item->orderHeader->order_number}}</a>
                                <br>
                        <div class="form-group">
                            <label for="product_name"><b>คุณ : </b>{{ $item->customer->name }}</label>
                        </div>
    <br>
                        <div class="form-group">
                            <label for="product_name"></label>
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
                        {{-- {{dd($item->seller_actual_status)}} --}}
                        @elseif($item->seller_actual_status == null)
                        <div class="form-group">
                            <label for="required_amount">Actual Qty</label>
                            <input
                                type="number"
                                class="form-control"
                                value="{{  $item->seller_actual_qty }}"
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
                        @endif

                        <div class="form-group">
                            @php
                                $disable = $orderDetail->first()->seller_actual_status != 0 ? true : false
                            @endphp
                            @if ($item->seller_actual_status == 0)
                                 {!! Form::submit('Save', ['form' => 'form-'.$key,'class' => 'btn btn-primary']) !!} 
                            @else
                            {!! Form::submit('Save', ['form' => 'form-'.$key,'class' => 'btn btn-primary' , 'disabled'=> $disable]) !!} 
                            @endif
                            
                        </div>
    
                    </div>
                </form>
                <div class="line-g">
                    <div class="line-r">
                    </div>
                </div>
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