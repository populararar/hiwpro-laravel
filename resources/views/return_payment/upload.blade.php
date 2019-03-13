@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">สรุปคืนเงินลูกค้า</h1>
    <h1 class="pull-right">
       
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            อัปโหลดหลักฐานการคืนเงิน
            <br>
            <form method="POST" action="{{ route('returnPayment.update', [ $payment->id]) }}" 
                enctype="multipart/form-data">
                    {!! csrf_field() !!} 
            
            <div class="form-group col-sm-6">
                {!! Form::label('img_return', 'Upload File:') !!}
                {!! Form::file('imgPathUpdate') !!}
            </div>

            <button type="submit" class="btn btn-outline-danger">อัปโหลด</button>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <div class="text-center">
    
    </div>
</div>
@endsection