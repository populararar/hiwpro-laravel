
@extends('layouts.hiwpro')
@section('content')
<style>
  .red{
    background-color: black;
  }
  .line{
    width: 100%;
    height: 1px;
    background-color: #ccc;
  }
  .card-text{
    text-align: center;
  }
  .btn-menu{
    width: 150px;
  }
  .center{
    margin:auto;
  }
</style>
@php
  $role = $userProfile->role->name;
@endphp
<div class="wrapper">
    <div class="mx-auto topic">
        <h1><i class="fas fa-money-check-alt"></i></h1>
    <h1>PROFILE - {{$user_id->name}}</h1>
        <div class="under_topic"></div>
    </div>
<div class="mx-auto col-md-12">
  {{-- <a class="btn btn-outline-danger btn-menu" href="{!! route('profiles.create',[$profile->id]) !!}" class='btn btn-default btn-xs'>เพิ่มเลขบัญชี</a> --}}
 
</div>
   
    @if($role=="SELLER")
   {{-- <a href="{!! route('profiles.create') !!}" class='btn btn-default btn-xs'>สร้างโปรไฟล์ของฉัน</a>
   <a href="{!! route('profiles.create') !!}" class='btn btn-default btn-xs'>รับงาน</a>
   <a href="{!! route('profiles.create') !!}" class='btn btn-default btn-xs'>ตรวจสอบ</a>  --}}
    @endif 
    @if($role=="USER")
    {{-- @include('profiles.customer'); --}}
    @endif 

{{-- body --}}
<div class="row mx-auto col-md-12" >
   
  <div class="col-md-12 red">
    <div class="card " >
      <img class='rounded card-img-top mx-auto mt-3 img-fliud' style="width:300px;" src="{{ asset('/storage/'.$profile->img) }}">
      <div class="card-body">
        <p class="card-text">
          Name : {{$user_id->name}} <br>
          Tel. : {{$profile->tel}} <br>
          E-mail : {{$user_id->email}}<br>
          ชื่อธนาคาร : {{$profile->bank_name}}<br>
          เลขบัญชีธนาคาร : {{mask_credit_card($profile->bank_num)}}<br></p>
          <a class="btn btn-outline-danger btn-menu " style="margin-left:45%;" href="{!! route('profiles.edit', [$profile->id]) !!}"><i class="fas fa-pen-square"></i> &nbsp;  แก้ไข/เพิ่มเติม</a>
      </div>
    </div>
  </div>
</div>

    
</div>
@php
    
function mask_credit_card($number){
    return str_repeat('X',3) .'-'.str_repeat('X',1).'-'.str_repeat('X',2) . substr($number , -5);
}
@endphp
   
@endsection