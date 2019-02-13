@extends('layouts.hiwpro')

@section('content')


<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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


/* ********************* */
.rating { 
  border: none;
  float: right;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
  float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
@php
  $num = $orderHeaders->total_price;
  $formattedNum = number_format($num);  
  $status_send=$orderHeaders->status;
  $status = $orderHeaders->slip_status;
    // dd($status);
    if ($status == "WAITING") {
        # code...
        $status ='รอการชำระเงิน';
    }
    if ($status == "UPLOADED") {
        # code...
        $status ='รอการตรวจสอบ';
    }
    if ($status_send == "") {
        # code...
        $status ='รอรับสินค้า';
    }
    if ($status_send == "CONFIRMED") {
        # code...
        $status ='ได้ส่งข้อมูลการสั่งซื้อไปยังผู้ขายแล้ว';
    }
    if ($status_send == "COMPLETED") {
        # code...
        $status ='สินค้าถูกจัดส่งแล้วกรุณาตรวจสอบ';
    }

    
    
@endphp


{{-- {{ dd($orderHeaders)}} --}}
<div class="container" style="padding: 0 5%;">
  <div class="page-header">
    <h3>สถานะการจัดส่งสินค้า</h3>
  </div>
  @include('flash::message')
 

  {{-- <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:5%;">
    <li class="nav-item">
      <a class="nav-link active" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">เงื่อนไขการใช้บริการ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="sent" aria-selected="false">รายละเอียดสินค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">รายละเอียดสินค้า</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab"> 
        <div class="container my-3">
        {{-- content 1--}}


        {{-- end history 
        </div>
       
    </div>
    <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">
        <div class="container my-3">
        {{-- content 2  -
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      {{-- content 3 --
  </div>

  tab --}}


  <div class="weapper" style="margin-top: 2%; padding:3% 5%; ">
      @include('flash::message')
    <h5>ข้อมูลคำสั่งซื้อ </h5>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>ตำเตือน!</strong> 
      กรุณาตรวจสอบหลักฐานการโอนก่อนกดชำระเงิน เพื่อป้องกันข้อผิดพลาดกรุณาอ่าน <br> <a href="">เงื่อนไขการใช้บริการ</a>
    </div>
    <div class="row">
      <div class=" col-md-4">
        <p>เลขคำสั่งซื้อ : </p>
        <p>
          <p class="font-gray">{{ $orderHeaders->order_number}}</p>
        </p>
      </div>
      <div class="col-md-4">
        <p>ชื่อผู้จัดส่ง : </p>
        <p>
          <p class="font-gray">{{ $orderHeaders->name.' '.$orderHeaders->lastname}} </p>
        </p>
      </div>
      <div class=" col-lg-4">
        <p>สถานะการชำระเงิน : </p>
        <p>
          <p class="font-gray">{{ $status}} </p>
        </p>
      </div>
    </div>

    <div class="row">
      <div class=" col-lg-4">
        <p>ที่อยู่ในการจัดส่ง : </p>
        <p>
        <p class="font-gray">{{ $orderHeaders->address }}</p>
        </p>
      </div>
      <div class="col-lg-4">
        <p>จำนวนสินค้า : </p>
        <p>
          @php
          $num=0;
              foreach( $orderHeaders->orderDetails as $item)
              {
                $num+=$item->qrt;
              }
          @endphp
          <p class="font-gray">
            {{ $num }} ชิ้น </p>
        </p>
      </div>
      <div class="col-lg-4">
        @if(!empty($orderHeaders->seller_actual_price))
          <p>ราคาที่แม่ค้าได้แปะๆ : </p>
          <p>
            <p class="font-gray">
              {{ $orderHeaders->seller_actual_price }} บาท </p>
          </p>
          @endif
        </div>


    </div>
    <div class="col-lg-6">
      <h5>ข้อมูลการจัดส่ง </h5>
    </div>

    <div class="row">
      <div class=" col-lg-6">
        <p>หมายเลขติดตามพัสดุ : {{ $orderHeaders->tracking_number }}</p>
        <p>
          <span>ตรวจสอบสถานะพัสดุ :<font color="red"> <a href="http://track.thailandpost.com/">http://track.thailandpost.com/</a></font></span>
          
            <p>
          </p>
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
    @if ($status =='WAITING') 
        <div class="col-md-6"><a href="{{ route('confirms.payment', [$orderHeaders->order_number])  }}" class="btn btn-warning w-100">ชำระเงิน</a> </div> 
        {{-- <div class="col-md-6"><button disabled="disabled" type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ได้รับสินค้า</button></div>    --}}
    @endif

    @if ($status =='UPLOADED') 
      @if ($reviewCount< 1)
            <div class="col-md-6"><button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ได้รับสินค้า</button></div>
      @endif
      
        {{-- <div class="col-md-6"><a href="{{ route('confirms.slip', [$orderHeaders->order_number])  }}" class="btn btn-info w-100">รายละเอียดใบเสร็จ</a> </div> --}}
    @endif

   
  </div>
  @if ($reviewCount< 1)
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

          <form method="POST" action="{{ route('orders.sellerreview', [$orderHeaders->order_number]) }}" enctype="multipart/form-data">
              {!! csrf_field() !!} 
              <input type="hidden" name="order_id" value="{{ $orderHeaders->id }}">
              <input type="hidden" name="order_number" value="{{ $orderHeaders->order_number }}">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">คะแนน:</label>
                {{-- <input name="score" type="text" class="form-control" id="recipient-name"> --}}
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
            </div>
            <div class="form-group has-feedback{{ $errors->has('comment') ? ' has-error' : '' }}">
              <label for="message-text" class="col-form-label">Comment:</label>
              <textarea name="comment" class="form-control" id="message-text"></textarea>
              @if ($errors->has('comment'))
                  <span class="help-block">
                      <strong>{{ $errors->first('comment') }}</strong>
                  </span>
              @endif
            </div>
            <div class="row">
                <div class="col-sm-6 imgUp">
                  <div class="imagePreview  has-feedback{{ $errors->has('img1') ? ' has-error' : '' }}"></div>
                    <label class="btn btn-primary">Upload
                      <input name="img1" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                    @if ($errors->has('img1'))
                        <span class="help-block">
                            <strong>{{ $errors->first('img1') }}</strong>
                        </span>
                    @endif
                </div><!-- col-2 -->
                <i class="fa fa-plus imgAdd"></i>
            </div><!-- row -->
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-danger">Send message</button>
          </div>
         </form>
      </div>
    </div>
  </div>
  @endif
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
        <h1 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h1>
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

  $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before(
          '<div class="col-sm-6 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input name="img2" type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
          $(".imgAdd").hide();
        });
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove(); 
            $(".imgAdd").show();
        });

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