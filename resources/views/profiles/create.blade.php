@extends('layouts.hiwpro')

@section('content')

 {!! Form::open(['route' => 'profiles.store']) !!}

                        @include('profiles.fields')

                    {!! Form::close() !!}

{{--     
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div> --}}
@endsection
