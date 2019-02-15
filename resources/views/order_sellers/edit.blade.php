@extends('layouts.app') @section('content')
<style>
h5,h1,h3{
    font-family: 'Kanit';
    /* font-weight: bolder; */
}

</style>
<section class="content-header">
    <h1>
        ข้อมูลคำสั่งซื้อ
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($orderHeader, ['route' =>
                ['orderSellers.update', $orderHeader->id], 'method' => 'patch'])
                !!} @include('order_sellers.fields') {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<section class="content-header">
    <h1>
        รายการ คำสั่งซื้อ
    </h1>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($orderHeader, ['route' =>
                ['orderSellers.update', $orderHeader->id], 'method' => 'patch',
                'name' =>'form-detail-seller']) !!}
                @include('order_sellers.detail') {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
