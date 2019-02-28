@extends('layouts.app')

<link href="https://getbootstrap.com/docs/3.3/assets/css/docs.min.css" rel="stylesheet"/>
@section('content')
<section class="content-header">
    <h1 class="pull-left" style="font-family:'Kanit';">Report Admins</h1><br>
    <h1 class="pull-right">
        {{-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{!! route('reportAdmins.create') !!}">Add New</a> --}}
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="shadow">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:5%;">
        <li class="nav-item">
            <a class="nav-link active in" id="orderReport-tab" data-toggle="tab" href="#orderReport" role="tab"
                aria-controls="orderReport" aria-selected="true">ข้อมูลยอดรายได้</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="sent"
                aria-selected="false">ข้อมูลยอดออร์เดอร์</a>
        </li>
       
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="orderReport" role="tabpanel" aria-labelledby="orderReport-tab">
        {{-- content 1 --}}
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
                                                {{ $stats['countOrder4'] }}
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
        
            <div class="box box-primary">
                    <div class="mx-auto" style="padding-left:30%;margin-top:5%;">
                        <h3 style="font-family: 'Kanit';">เลือกช่วงเวลา</h3>
                        <form method="GET" action="{{ route('reportAdmins.index') }}">
                            <input type="date" name="start">
                            <input type="date" name="end">
                            <button class="btn btn-danger" type="submit">search</button>
                            <button  class="btn btn-white" type="button" onclick="javascript:location.href='{{ route('reportAdmins.index') }}'">clear</button>
                        </form> 
                    </div>
                
                    <div id="perf_div"></div>
                    {!! $lava->render('ColumnChart', 'Income', 'perf_div') !!}
            
                    <div id="perf_div_fee"></div>
                    {!! $lava->render('ColumnChart', 'Fee', 'perf_div_fee') !!}
            
        
                <div class="box-body">
                    {{-- @include('report_admins.table') --}}
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">

            {{-- content 2 --}}
            
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
                <div class="box-body">
                    ข้อมูลยอดออร์เดอร์ 
                    <div id="order_div"></div>
                    {!! $lava->render('ColumnChart', 'Orders', 'order_div')  !!}
                </div>
            </div>


        </div>

      
    </div>

    </div>
    {{-- shadow --}}




    
   
   
    
    {{-- <div class="text-center">
       
    </div> --}}
</div>
<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
        $(this).tab('show');
        });
    });
</script>
@endsection