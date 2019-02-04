@extends('layouts.hiwpro')

@section('content')
 @include('adminlte-templates::common.errors')

            {!! Form::open(['route' => 'profiles.store', 'enctype' => 'multipart/form-data']) !!}
                @include('profiles.fields')
            {!! Form::close() !!}

{{--     
    <div class="content">
       
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div> --}}
@endsection
