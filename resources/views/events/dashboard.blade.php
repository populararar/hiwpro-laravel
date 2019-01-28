@extends('layouts.app')

@section('content')
<style>
  .box-card{
    width: 24%;
    height: 100px;
    margin-left: 5px;
    background-color: #eee;
    text-align: center;

}
.col-sm-6{
  width: 50% !important; 

}


</style>
<section class="content-header">
  <h1 class="pull-left">Events</h1>
  <h1 class="pull-right">
    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('events.create') !!}">Add
      New</a>
  </h1>
</section>
<div class="content">
  <div class="clearfix"></div>

  @include('flash::message')

  <div class="clearfix"></div>

  <div class="box box-danger">
    <div class="box-body">
      <div class="d-flex">
        <div class=" box-card col-sm-3">
        <h1>{{ $stats['countS'] }}</h1>
          Total Seller
        </div>
        <div class="box-card col-sm-3 ">
          <h1>{{ $stats['countU'] }}</h1>
          Total User
        </div>
        <div class=" box-card col-sm-3">
          <h1 style="color:red;">{{ $stats['countC'] }}</h1>
          Total Order
        </div>
        <div class=" box-card col-sm-3">
          <h1>{{ $stats['countP'] }}</h1>
          Total Product
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="box box-danger col-sm-6">
    <div class="box-body">
      ข้อมูลรายได้ 
            <div id="pop_div"></div>
            {!! $lava->render('AreaChart', 'Population', 'pop_div')  !!}
    </div>
  </div>

  

  <div class="box box-primary col-sm-6">
    <div class="box-body">
      ข้อมูลยอดออร์เดอร์ 
        <div id="order_div"></div>
        {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!}
    </div>
  </div>
  
  <div class="clearfix"></div>
  <div class="box box-primary col-sm-6">
    <div class="box-body">
     ข้อมูลรายได้ 
        <div id="order_div"></div>
        {{-- {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!} --}}
      {{-- @include('events.table') --}}
    </div>
  </div>

  <div class="box box-primary col-sm-6">
    <div class="box-body">
    นักหิ้วมือโปร 
        <div id="order_div"></div>
        {{-- {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!} --}}
      {{-- @include('events.table') --}}
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="box box-primary col-sm-6">
    <div class="box-body">
    สินค้าขายดี 
        <div id="order_div"></div>
        {{-- {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!} --}}
      {{-- @include('events.table') --}}
    </div>
  </div>
  <div class="box box-primary col-sm-6">
    <div class="box-body">
    ประเภทสินค้าขายดี
        <div id="order_div"></div>
        {{-- {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!} --}}
      {{-- @include('events.table') --}}
    </div>
  </div>
    
  <div class="text-center">

  </div>
</div>
@endsection