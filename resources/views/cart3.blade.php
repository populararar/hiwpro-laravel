@extends('layouts.hiwpro')

@section('content')
<div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; margin-top:2.5%; ">

        <form class="form-horizontal" name="customer" action="/Christmas/function/frontend/insertmember.php" method="post"
          onsubmit="return validationReg()" enctype="multipart/form-data">
  
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
              <button style="text-align:center; width: 50%;"  type="button" class="btn btn-outline-secondary">ย้อนกลับ</button>
              <button style="text-align:center; width: 50%;"  type="button" class="btn btn-success">ยืนยันการชำระเงิน</button>
            </div>
          </div>
        </form>
  
 </div>
{{-- weapper --}}

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


</script>
@endsection
  