@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">รายการสินค้า</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('orderSellers.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 box-card card">
                        <h1>20</h1>
                        ยอดออร์เดอร์</div>
                    <div class="col-md-3 box-card card">
                        <h1>2,300</h1>
                        รายได้/บาท</div>
                    <div class="col-md-3 box-card card">
                        <h1>20</h1>
                        คะแนนดาว</div>
                    <div class="col-md-3 box-card card">
                        <h1>20</h1>
                        โบนัส/บาท</div>
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

