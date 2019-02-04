@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">
    <section class="content-header">
        <h1 style="font-family: 'Kanit', sans-serif;">
            Payment
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('payments.show_fields')

                    

                    <a href="{!! route('payments.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
