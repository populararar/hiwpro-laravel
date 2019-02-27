@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">
    <section class="content-header">
        <h1 style="font-family:'Kanit';">
            รายการสินค้า
        </h1>
    </section>
    <div class="content">


        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <a href="{!! route('orderSellers.index') !!}" class="btn btn-danger">กลับไปรายการสั่งซื้อ</a>
                    <a href="{!! route('orderSellers.edit', [$orderHeader->id]) !!}" class='btn btn-default '> จัดการออร์เดอร์</a>
                    @include('order_sellers.show_fields')
                    {{-- <a href="{!! route('orderSellers.index') !!}" class="btn btn-default">Back</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
