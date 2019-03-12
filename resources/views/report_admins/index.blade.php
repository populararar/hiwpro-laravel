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
</style>
@section('content')
<section class="content-header" style="text-align:center;">
        <ul class="menu">
                <li><a href="{!! route('reportAdmins.index') !!}" class="active" >ข้อมูลรายได้</a></li>
                <li><a href="{!! route('reportAdmins.orderReport') !!}">ข้อมูลการสั่งซื้อ</a></li>
                <li><a href="{!! route('reportAdmins.orderSeller') !!}">ข้อมูลแม่ค้า</a></li>
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
                    <div class="mx-auto"  style="text-align:center;" >
                        <br>
                        <i class="fas fa-book-open"></i>
                        <h3>สรุปรายได้</h3>
                        <form method="GET" action="{{ route('reportAdmins.index') }}">
                            <input type="date" name="start">
                            <input type="date" name="end">
                            <button class="btn btn-danger" type="submit">search</button>
                            <button class="btn btn-white" type="button" onclick="javascript:location.href='{{ route('reportAdmins.index') }}'">clear</button>
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
<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
        $(this).tab('show');
        });
    });
</script>
@endsection