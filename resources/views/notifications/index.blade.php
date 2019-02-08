@extends('layouts.hiwpro')

@section('content')
<style>
.topic h1{
    margin-top: 2%; 
    color: #df3433;
    text-align: center;
}
.under_topic{
    width:50px;
    height:5px; 
    background-color:#cf2132;
    margin:auto;
}
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

