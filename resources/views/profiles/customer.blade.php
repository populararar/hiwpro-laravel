
{{-- 
@php

  $id = $user->id;  
// if($id=='1') @include('profiles.admin')


{{-- @if (!empty($profile->id))
     <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

@endif
@if (empty($profile->id))
    {{-- <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> 
@endif --}}
{{--  --}}
{{-- {{dd($user_id)}} --}}

{{--"id" => 19
    "tel" => "0629159535"
    "img" => "/upload/fhtEijkqA0R4KflIqTHUPlDgLUDqBL9rmZeWseu2.jpeg"
    "address_id" => null
    "bank_num" => null
    "bank_name" => null
    "national_id" => null
    "national_img" => null
    "national_img2" => null
    "user_id" => 71
    "status" => 1
    "created_at" => "2019-02-06 08:01:19"
    "updated_at" 
 @foreach ($user_id as $item)
    
@endforeach --}}

<style>
  .red{
    background-color: red;
  }
  .purple{
    background-color: plum;
  }
  .rebeccapurple{
    background-color:rebeccapurple ;
  }
  .blue{
    background-color: blue;
  }
  .line{
    width: 100%;
    height: 1px;
    background-color: #ccc;
  }
</style>

<div class="wrapper">

 
    

    <a href="{!! route('profiles.create') !!}" class='btn btn-default btn-xs'>สร้างโปรไฟล์ของฉัน</a>
    {{-- <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'>แก้ไขโปรไฟล์ของฉัน</a>

    {{-- {{dd($profile)}} --}}
    
  <div class="row mx-auto col-md-12" style="height:500px;">
      <div class="col-md-2 purple">

        </div>
    <div class="col-md-4 red">
      <div class="card w-100">
        <img class='card-img-top mx-auto w-50 img-fliud' src="{{ asset('/storage/'.$profile->img) }}">
        <div class="card-body">
          <p class="card-text">จำนวน Order </p>
        </div>
      </div>
        
    </div>
    <div class="col-md-4 purple">
        <div class="card w-100">
            <div class="card-body">
            <h5 class="card-title">{{$user_id->name}}</h5>
            @if($role=="SELLER")
            <p class="card-text">รับหิ้วเครื่องสำอางลดราคาตามช้อป eveandboy Watson
                sephora ได้ของแน่นอน เพราะหิ้วเก่ง
                <div class="line"></div>
                เบอร์โทร : {{$profile->tel}} <br>
                {{$user_id->name}}
                 งานที่เคยรับหิ้ว     24    ออเดอร์ <br>
                ยอดการทำงานสำเร็จ  24    ออเดอร์  <br>
                คะแนนงาน  5 ดาว</p>
            @endif 
            @if($role=="USER")
              <p class="card-text">
                  <div class="line"></div>
                  เบอร์โทร : {{$profile->tel}} <br>
                  {{$user_id->email}}
            @endif 
            </div>
        </div>
    </div>
    <div class="col-lg-2 blue">

      </div>
  </div>

</div>

