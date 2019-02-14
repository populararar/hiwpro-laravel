@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Report Sellers</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reportSellers.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <form method="GET" action="{{ route('reportAdmins.index') }}">
                    <input type="date" name="start">
                    <input type="date" name="end">
                    <button type="submit">search</button>
                    <button type="button" onclick="javascript:location.href='{{ route('reportSellers.index') }}'">clear</button>
                </form>
            
                <div id="perf_div_fee"></div>
                {!! $lava->render('ColumnChart', 'Fee', 'perf_div_fee') !!}
              

            <div class="box-body">
                    {{-- @include('report_sellers.table') --}}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            @foreach ($orderGroup as $key => $group)
            
                <p>name : {{$key}}</p>
                @php
                    $item = $group->first();
                    $itemQty = $group->sum('qrt');
                @endphp
                <p>img  : {{$item->product_img}}</p>
                <p>จำนวน  : {{$itemQty}}</p>
            @endforeach
        </div>
        
        <div class="text-center">
        
        </div>
    </div>
@endsection

