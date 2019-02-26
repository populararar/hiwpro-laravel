@extends('layouts.app')
<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
@section('content')
    <section class="content-header">
        <h1 class="pull-left" style="font-family:'Kanit';">My Orders</h1><br>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('orderSellers.create') !!}">Add New</a>
        </h1> --}}
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
            <div class="box-body">
                    @include('order_sellers.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

