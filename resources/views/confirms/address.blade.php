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
  <div class="col">
    <h4 style="margin-top: 2%; color: #df3433;">ที่อยู่การจัดส่ง </h4>
    <p class="h9">สั่งซื้อสินค้ากับหิ้วโปร</p>
  </div>

  <div class="row" style="background-color:#fff;">
    <div class="col-12">
      <div class="form-group">
        <div class="btn-group d-flex justify-content-center ">
          <button style="text-align:center; width: 50%;" type="button" class="btn btn-outline-danger">รายการสั่งซื้อ</button>
          <button style="text-align:center; width: 50%;" type="button" class="btn btn-outline-danger">สรุปรายการสั่งซื้อ</button>
          <button style="text-align:center;width:50% " type="button" class="btn btn-danger align-self-center ">ที่อยู่การจัดส่ง</button>
          <button style="text-align:center;width:50% " type="button" class="btn btn-outline-danger align-self-center ">ยืนยันการสั่งซื้อ</button>
        </div>
      </div>
    </div>
  </div>

  <div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; margin-top:2.5%; ">


    <form class="form-horizontal" action="{{ route('confirms.final') }}" method="post">
      {{-- <input name="_method" type="hidden" value="PATCH"> --}}
      {!! csrf_field() !!}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputName">ชื่อจริง</label>
          <input type="text" name="firstname" class="form-control" placeholder="First name">
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
          <label for="inputCity">เขตอำเภอ</label>
          <input id="city" name="city" type="text" class="form-control" placeholder="ตัวอักษรไทยหรือภาษาอัง..">
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">จังหวัด</label>
          <input id="state" name="state" type="text" class="form-control" placeholder="ตัวอักษรไทยหรือภาษาอัง..">
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
          <button style="text-align:center; width: 50%;" class="btn btn-success" type="submit">ยืนยันการชำระเงิน</button>
        </div>
      </div>
    </form>
  </div>
 
</div>

@endsection

@section('scripts')

<script>
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


</script>
@endsection