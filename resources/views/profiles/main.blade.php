
{{-- 
@php

  $id = $user->id;  
// if($id=='1') @include('profiles.admin')
@endphp --}}
@extends('layouts.app')

@section('content')

<h1>hi</h1>

@if (!empty($profile->id))
     <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

@endif

<h1>Hi Profile</h1>
   
@endsection