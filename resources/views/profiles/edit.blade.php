@extends('layouts.hiwpro')

@section('content')
  
       @include('adminlte-templates::common.errors')
     
                   {!! Form::model($profile, ['route' => ['profiles.update', $profile->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('profiles.fields')

                   {!! Form::close() !!}
    
  
@endsection