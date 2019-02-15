@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left" style="font-family:'Kanit';">Report Admins</h1>
    <h1 class="pull-right">
        {{-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{!! route('reportAdmins.create') !!}">Add New</a> --}}
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="box box-primary">
            <div class="mx-auto">
                <form method="GET" action="{{ route('reportAdmins.index') }}">
                    <input type="date" name="start">
                    <input type="date" name="end">
                    <button type="submit">search</button>
                    <button type="button" onclick="javascript:location.href='{{ route('reportAdmins.index') }}'">clear</button>
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
    <div class="text-center">

    </div>
</div>
@endsection