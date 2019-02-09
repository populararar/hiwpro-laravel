@extends('layouts.hiwpro')

@section('content')
<style>

</style>
<div class="wrapper" style=" padding:3%; ">

        <div class="mx-auto topic">
            <h1><i class="fas fa-money-check-alt"></i></h1>
            <h1>กล่องข้อความ </h1>
            <div class="under_topic"></div>
        </div>
          @include('flash::message')       
        <div class="shadow">
                @include('notifications.table')
        </div>
       
       

  

@endsection

