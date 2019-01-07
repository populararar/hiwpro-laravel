@extends('layouts.hiwpro')

@section('content')

<div class="container" style="padding: 0 5%;">
    <div class="col">
      <h4 style="margin-top: 2%; color: #df3433;">รายการสั่งซื้อ </h4>
      <p class="h9">สั่งซื้อสินค้ากับหิ้วโปร ที่อยู่ในการจัดส่ง</p>
    </div>
<div class="weapper" style="background-color: #F9F9F9; padding:3%; ">

{{--  <a href="#" class="btn btn pull-right btn-primary btn-danger btn-sm " >Update</a> --}}
<div class="row"  style="background-color:#fff;">
    <div class="col-12">
  <div class="form-group">
      <div class="btn-group d-flex justify-content-center ">
        <button style="text-align:center;width: 50%;"  type="button" class="btn btn-outline-danger">รายการสั่งซื้อ</button>
        <button style="text-align:center;width: 50%;"  type="button" class="btn btn-outline-danger align-self-center">สรุปรายการสั่งซื้อ</button>
        <button style="text-align:center;width:50% "type="button" class="btn btn-danger ">ที่อยู่การจัดส่ง</button>
        <button style="text-align:center;width:50% "type="button" class="btn btn-outline-danger align-self-center ">ยืนยันการสั่งซื้อ</button>
      </div>
    </div>
</div>   

</div>
{{--   <div class="row" style="background-color:#fff;padding:5%;">
</div>row --}}
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


</script>
@endsection