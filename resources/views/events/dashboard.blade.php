@extends('layouts.app')
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
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
  {{-- <h1 class="pull-left">Dash board</h1> --}}
 
</section>
<div class="content">
  <div class="clearfix"></div>

  @include('flash::message')

  <div class="clearfix"></div>

  <div class="box box-danger">
      <div class="box-body">
              <div class="row">
                  <div class="col-sm-3">
                          <div
                              class="bs-callout bs-callout-info"
                              id="callout-btn-group-tooltips">
                              <h4>
                                  {{ $stats['countS'] }}
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
                                  {{ $stats['countU'] }}
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
                                  {{ number_format($stats['countC']) }} 
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
                                  {{ $stats['countP'] }}
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

  {{-- <div class="box box-danger col-sm-6">
    <div class="box-body">
      ข้อมูลรายได้ 
            <div id="pop_div"></div>
            {!! $lava->render('AreaChart', 'Population', 'pop_div')  !!}
    </div>
  </div> --}}

  

  <div class="box box-primary col-sm-12">
    <div class="box-body">
      ข้อมูลยอดออร์เดอร์ 
        <div id="order_div"></div>
        {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!}
    </div>
  </div>
  
  <div class="clearfix"></div>
  

</div>
@endsection