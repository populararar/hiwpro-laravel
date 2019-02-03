@extends('layouts.hiwpro')

@section('content')
<style>
  .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px
            ;min-width: 35px;
            text-align: center;
        }
        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            }
        .qty .minus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }
        .minus:hover{
            background-color: #717fe0 !important;
        }
        .plus:hover{
            background-color: #717fe0 !important;
        }
        /*Prevent text selection*/
        span{
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        input{  
            border: 0;
            width: 2%;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input:disabled{
            background-color:white;
        }
        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 29.333333%;
        }
        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0%;
        }

</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" style="padding: 0 5%;">


  <div class="row" style="text-align:center;margin-top:2.5%;">
      <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br></i>รายการสั่งซื้อ</div> 
      <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>สรุปรายการสั่งซื้อ</div>
      <div class="col-sm-12 col-md-3"> 
          <h1 style="text-align:center; margin-top: 2%; color: #df3433;"><i class="fas fa-address-card"></i></h1>
          <h4 style="text-align:center; margin-top: 2%; color: #df3433; font-weight:bolder;">ที่อยู่การจัดส่ง</h4>
          <div style="width:50px;height:5px; background-color:#cf2132;margin:auto;"></div></div>
      
      <div class="col-sm-3 d-none d-sm-none d-md-block col-md-3"><br><br><i class="fas fa-caret-right float-left"></i>ยืนยันการสั่งซื้อ</div>
  </div>

  <div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; margin-top:2.5%; ">


    <form class="form-horizontal" action="{{ route('confirms.final') }}" method="post">
      {{-- <input name="_method" type="hidden" value="PATCH"> --}}
      {!! csrf_field() !!}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputName">ชื่อจริง</label>
          <input type="text" name="name" class="form-control" placeholder="First name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputLastname">นามสกุล</label>
          <input type="text" name="lastname" class="form-control" placeholder="Last name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">ที่อยู่</label>
        <textarea class="form-control" name="address" placeholder="1234 Main St" rows="5"></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">จังหวัด</label>
          {{-- <input id="city" name="city" type="text" class="form-control" placeholder="ตัวอักษรไทยหรือภาษาอัง.."> --}}
          <select id="provinces" name="city"  class="form-control provinces" >
              <option value="">เลือกข้อมูลจังหวัดของท่าน</option>
              @foreach ($list as $row)
                <option value="{{ $row->id}}">{{ $row->name_th}}</option>
              @endforeach
             
            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">เขตอำเภอ</label>
          {{-- <input id="state" name="state" type="text" class="form-control" placeholder="ตัวอักษรไทยหรือภาษาอัง.."> --}}
          <select id="amphures" name="state" class="form-control amphures">
              <option value="">เลือกข้อมูลอำเภอของท่าน</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">ประเทศ</label>
          <input id="country" name="country" type="text" class="form-control" id="inputCity" placeholder="ตัวอักษรไทยหรือภาษาอัง..">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">รหัสไปรษณีย์</label>
          <input id="zip" name="zip" type="text" class="form-control" id="inputZip" placeholder="ตัวเลขเท่านั้น..">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
      </div>

      <!-- Form actions -->
      <div class="form-group">
        <div class="btn-group d-flex justify-content-center">
          <button style="text-align:center; width: 50%;" type="button" class="btn btn-outline-secondary">ย้อนกลับ</button>
          <button style="text-align:center; width: 50%;" class="btn btn-success" type="submit">ถัดไป</button>
        </div>
      </div>
    </form>
  </div>
 
</div>

@endsection

@section('scripts')

<script type="text/javascript">

  $(document).ready(function () {

    $(document).on('click', '.plus', function () {
      $('.count').val(parseInt($('.count').val()) + 1);
    });


    $(document).on('click', '.minus', function () {
      $('.count').val(parseInt($('.count').val()) - 1);
      if ($('.count').val() == 0) {
        $('.count').val(1);
      }
    });
  });

  var form = $('#cart-form')
  function addSeller(eventShopId, sellerId) {
    var data = eventShopId + '|' + sellerId
    var filter = [];
    $("input[name*='seller']").filter(function (index) {
      var a = $(this).val()
      if (a.split("|")[0] == eventShopId) {
        console.log($(this).val().split("|")[0], eventShopId)

        $(this).remove();
        return true
      }
      return false
    });

    if (filter.length < 1) form.append('<input type="text" name="seller[]" value="' + data + '">');
  }


  $('.provinces').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            var _token=$('input[name="_token"]').val();
          
            $.ajax({
                url:"{{route('dropdown.fetch')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success: function(result){
                    $('.amphures').html(result);
                }
            });
         
        }
        
    });

 

$(function() {
    $('.tabs li').on('click', function() {
        var tabId = $(this).attr('data-tab');

        $('.tabs li').removeClass('current');
        $('.tab-pane').removeClass('current'); 

        $(this).addClass('current');
        $('#' + tabId).addClass('current');
    });
});
 


</script>
@endsection