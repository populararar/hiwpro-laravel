@extends('layouts.hiwpro')

@section('content')
<style>
  body
  {
    font-family: 'Kanit', sans-serif; 
  }
        
  .font-gray
  {
    margin-top: 2%; color: gray;
  }

  .page-header {
    padding-bottom: 9px;
    margin: 40px 0 20px;
    border-bottom: 1px solid #eee;
  }
  .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}



</style>
@php
  $num = $orderHeaders->total_price;
  $formattedNum = number_format($num);  
@endphp

{{-- {{ dd($orderHeaders)}} --}}
<div class="container" style="padding: 0 5%;">
  <div class="page-header">
    <h3>สถานะการจัดส่งสินค้า</h3>
  </div>
  <div class="weapper" style="margin-top: 2%; padding:3% 5%; ">
    <h6>ข้อมูลคำสั่งซื้อ </h6>
    <div class="row">
      <div class=" col-md-4">
        <h6 style="margin-top: 2%;">เลขคำสั่งซื้อ : </h6>
        <p>
          <h6 class="font-gray">{{ $orderHeaders->order_number}}</h6>
        </p>
      </div>
      <div class="col-md-4">
        <h6 style="margin-top: 2%;">ชื่อผู้จัดส่ง : </h6>
        <p>
          <h6 class="font-gray">{{ $orderHeaders->address}} </h6>
        </p>
      </div>
      <div class=" col-lg-4">
        <h6 style="margin-top: 2%;">สถานะการชำระเงิน : </h6>
        <p>
          <h6 class="font-gray">{{ $orderHeaders->slip_status}} </h6>
        </p>
      </div>
    </div>

    <div class="row">
      <div class=" col-lg-4">
        <h6 style="margin-top: 2%;">ที่อยู่ในการจัดส่ง : </h6>
        <p>
        <h6 class="font-gray">{{ $orderHeaders->address }}</h6>
        </p>
      </div>
      <div class="col-lg-4">
        <h6 style="margin-top: 2%;">จำนวนสินค้า : </h6>
        <p>
          @php
          $num=0;
              foreach( $orderHeaders->orderDetails as $item)
              {
                $num+=$item->qrt;
              }
          @endphp
          <h6 class="font-gray">
            {{ $num }} ชิ้น </h6>
        </p>
      </div>
    </div>
    <div class="col-lg-6">
      <h6>ข้อมูลการจัดส่ง </h6>
    </div>

    <div class="row">
      <div class=" col-lg-6">
        <h6 style="margin-top: 2%;">หมายเลขติดตามพัสดุ : </h6>
        <h6 style="margin-top: 2%; ">   </h6>
        <p>
          <h6 style="margin-top: 2%;">ตรวจสอบสถานะพัสดุ : </h6>
          <h6 style="margin-top: 2%;"><a href="http://track.thailandpost.com/">http://track.thailandpost.com/</a>
            <p>
          </h6>
        </p>
      </div>
    </div>
    <!-- row -->
</div>
<div class="wrapper">

  <div class="row">


    @php
       $status = $orderHeaders->slip_status;
    @endphp

    {{-- @if ($status ='UPLOADED')
        <div class="col-md-6"><a href="{{ route('confirms.payment', [$orderHeaders->order_number])  }}" class="btn btn-light w-100">ชำระเงิน</a> </div>
        <div class="col-md-6"><button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ได้รับสินค้า</button></div>
    @endif --}}

    @if ($status =='WAITING') 
        <div class="col-md-6"><a href="{{ route('confirms.payment', [$orderHeaders->order_number])  }}" class="btn btn-light w-100">ชำระเงิน</a> </div> 
        <div class="col-md-6"><button disabled="disabled" type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ได้รับสินค้า</button></div>   
    @endif

    @if ($status =='UPLOADED') 
        <div class="col-md-6"><a href="{{ route('confirms.slip', [$orderHeaders->order_number])  }}" class="btn btn-info w-100">รายละเอียดใบเสร็จ</a> </div>
        <div class="col-md-6"><button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ได้รับสินค้า</button></div>
    @endif
   
    
    
  </div>
 
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ได้รับสินค้าเรียบร้อย</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">คะแนน:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Comment:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
          <div class="row">
              <div class="col-sm-5 imgUp">
                <div class="imagePreview"></div>
                  <label class="btn btn-primary">Upload
                    <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                  </label>
              </div><!-- col-2 -->
              <i class="fa fa-plus imgAdd"></i>
          </div><!-- row -->

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-danger">Send message</button>
        </div>
      </div>
    </div>
  </div>
  <!-- weapper -->
  <div class="page-header">
    <h3> ข้อมูลสินค้า</h3>
  </div>
 
@foreach( $orderHeaders->orderDetails as $item)
@php
  $num = $orderHeaders->total_price;
  $formattedNum = number_format($num);  
@endphp
  <div class="shadow-sm  mb-5 bg-white rounded">
    <div class="row">
      <div class="col-md-5">
          <img class='card-img-top w-50' src="{{ asset('/storage/'.$item->product->image_product_id) }}">
      </div>
      <div class="col-md-7 " style="padding-top:2%;">
        <h3 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h3>
        <p>ประเภทสินค้า : เครื่องสำอางค์</p>
        <p>ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
        <p>จำนวน {{$item->qrt }} ชิ้น</p>
        <p>ราคา {{$item->price }} ชิ้น</p>
      </div>
    </div>
  </div>



 @endforeach

</div>
<!-- container -->
</div>
<!-- container -->

@endsection

@section('scripts')
<script>

  $star_rating = $('.star-rating .fa');
  var SetRatingStar = function () {
    return $star_rating.each(function () {
      if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
        return $(this).removeClass('fa-star-o').addClass('fa-star');
      } else {
        return $(this).removeClass('fa-star').addClass('fa-star-o');
      }
    });
  };

  $star_rating.on('click', function () {
    $star_rating.siblings('input.rating-value').val($(this).data('rating'));
    return SetRatingStar();
  });

  SetRatingStar();
  $(document).ready(function () {

  });

  $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before(
          '<div class="col-sm-5 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
        $(document).on("click", "i.del" , function() {
	          $(this).parent().remove(); });

  $(function() {
      $(document).on("change",".uploadFile", function()
      {
          var uploadFile = $(this);
          var files = !!this.files ? this.files : [];
          if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
  
          if (/^image/.test( files[0].type)){ // only image file
              var reader = new FileReader(); // instance of the FileReader
              reader.readAsDataURL(files[0]); // read the local file
  
              reader.onloadend = function(){ // set image data as background of div
                  //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
  uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
              }
          }
        
      });
  });
    
</script>
@endsection