@extends('layouts.app')
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
</style>
@section('content')
<section class="content-header" style="text-align:center;">
        <a href="{!! route('reportAdmins.index') !!}" class="btn  btn-header" 
        ><h4>ข้อมูลรายได้</h4></a>
        <a href="{!! route('reportAdmins.orderReport') !!}" class="btn btn-primary" style="width:150px; margin-left:2%;">
       <h4> 
                ข้อมูลการสั่งซื้อ</h4></a> 
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
                                            {{ $stats['countOrder1'] }}
                                    </h4>
                                    <p>
                                            ชำระเงินเรียบร้อย
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{ $stats['countOrder2'] }}
                                    </h4>
                                    <p>
                                            ตรวจสอบเรียบร้อย
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{ $stats['countOrder3'] }}
                                    </h4>
                                    <p>
                                            จัดส่งเรียบร้อย
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div
                                    class="bs-callout bs-callout-info"
                                    id="callout-btn-group-tooltips">
                                    <h4>
                                            {{ $stats['countOrder4'] }}
                                    </h4>
                                    <p>
                                            รับสินค้า
                                    </p>
                                </div>
                            </div>
                    </div>
            </div>
    </div>

    <div class="box box-primary col-sm-12">
        <div class="box-body" style="text-align:center;">
            ข้อมูลยอดออร์เดอร์ 
            <div id="order_div"></div>
            {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!}
        </div>
    </div>
    </div>
</div>
@endsection