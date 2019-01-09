@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">


<section class="content-header">
    <h1 class="pull-left" style="font-family: Kanit;">Product events</h1>

    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productevents.store']) !!}

                        @include('productevents.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
