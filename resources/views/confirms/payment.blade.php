@extends('layouts.hiwpro')

@section('content')
<style>
h1 {
    text-align: center;
}

.tabs {
    list-style: none;
    margin: 0;
    padding: 0;
}

.tabs li {
    display: inline-block;
    padding: 15px 25px;
    background: none;
    text-transform: uppercase;
    cursor: pointer;
}


.tabs li.current {
    background: #fff;
    border: 1px solid #2311;
    border-bottom: 1px solid #cf2132;
}
.tab-contents {
    background: #fff;
    padding: 20px;
    border-top: 1px solid #ddd;
}

.tab-pane {
    display: none;
}

.tab-pane.current {
    display: block;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 0;
    background-color: transparent;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: 0%;
    border-top: 1px solid #dee2e6;
}
h4,h5{
    text-align: center;
}
.title{
    border-bottom:2px solid #cf2132;
    box-sizing: border-box;
}
.page-header {
    padding-bottom: 9px;
    margin: 40px 0 20px;
    border-bottom: 1px solid #eee;
}

</style>
<div class="container">


้
<div class="weapper" style="background-color: #fff; padding:3%; ">
        <h4 style="margin-top: 2%; color: #df3433;">ชำระเงิน </h4>
      
       
           
        {{-- <span> <div class="shadow-sm p-3 mb-5 bg-white rounded"></div>
            <font color="red">*</font>
            วันที่ชำระเงิน
        </span> --}}
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
          
        <div class="row">
            <div class="col-md-2">หมายเลขสั่งซื้อ :</div>
            <div class="col-md-10">
                <p>  
                    <span>{{ $orderHeaders->order_number}}</span>
                </p>
            </div>
            <div class="col-md-2">สถานะการจัดส่ง :</div>
            <div class="col-md-4">
                <p>  
                    <span>{{ $orderHeaders->slip_status}}</span>
                </p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <p>  
                    <span>ยอด : <font color="red">{{ $orderHeaders->total_price}}</font> บาท</span>
                </p>
            </div>

            

            <div class="col-md-2">ที่อยู่สำหรับจัดส่ง :</div>
            <div class="col-md-10">
                <p>
                    <span>{{ $user->name}}</span>
                    
                </p>
            </div>
            
            <div class="col-md-2">วิธีการจัดส่ง :</div>
            <div class="col-md-10">
                <p>  
                    <span>ขอนแก่น</span>
                    <span>เมืองขอนแก่น</span>
                    <span>ศิลา</span>
                    <span>557 หมู่ 12</span>
                </p>
            </div>   
            <div class="col-12">
                    <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        รายละเอียดสินค้า
                    </a>
                    
                    </p>
                    <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                    </div>
            </div>
             {{-- <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       รายละเอียดสินค้า
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Order Detail
                    </div>
                </div>
                </div>
            </div> --}}
        
        </div>
        </div>
       
       

         <div class="tab-example">
             <ul class="tabs">
                    <li class="tab-link" data-tab="tab1">จ่ายเงินผ่านบัตร</li>
                    <li class="tab-link" data-tab="tab2">โอนเงินเข้าธนาคาร</li>
                    
                </ul>
                <div class="tab-contents">
                    <div class="tab-pane" id="tab1">
                        
                        <div class="form-inline">
                                <div class="form-group">
                                  <label for="inputname_card">จ่ายเงินผ่านบัตร  </label>
                                  <select  class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="0" selected>ธนาคารกรุงเทพ</option>
                                        <option value="1">ธนาคารกรุงศรีอยุธยา</option>
                                        <option value="2">ธนาคารกสิกรไทย</option>
                                        <option value="3">ธนาคารไทยพาณิชย์</option>
                                        <option value="4">ธนาคารกรุงไทย</option>
                                        <option value="5">ธนาคารทหารไทย</option>
                                        <option value="6">ธนาคารเกียรตินาคิน</option>
                                        <option value="7">ธนาคารซิติแบงก์</option>
                                        <option value="8">ธนาคารซีไอเอ็มบี ไทย</option>
                                        <option value="9">ธนาคารธนชาต</option>
                                        <option value="10">ธนาคารนครหลวงไทย</option>
                                        <option value="11">ธนาคารยูโอบี</option>
                                        <option value="12">ธนาคารไอซีบีซี (ไทย)</option>
                                        <option value="13">ธนาคารอื่นๆ</option>
                                        <option value="14">ธนาคารกรุงเทพ</option>
                                </select>                               
                                </div>
                        </div>
                        <div class="form-inline">
                                <div class="form-group">
                                  <label for="inputname_card">ชื่อผู้ถือบัตร</label>
                                  <input type="text" id="name_card" class="form-control mx-sm-3">
                                  <small id="passwordHelpInline" class="text-muted">
                                    Must be 8-20 characters long.
                                  </small>
                                </div>
                        </div>
                        <div class="form-inline">
                                <div class="form-group">
                                  <label for="inputname_card">เลขหน้าบัตร</label>
                                  <input type="number" id="num_card" class="form-control mx-sm-3">
                               
                                </div>
                        </div>
                        <div class="form-inline">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">วันหมดอายุ(ดด/ปป)</label>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                    <option selected>Jan(01)</option>
                                    <option value="1">Feb(02)</option>
                                    <option value="2">Mar(03)</option>
                                    <option value="3">Apr(04)</option>
                                    <option value="4">May(05)</option>
                                    <option value="5">Jun(06)</option>
                                    <option value="6">Jul(07)</option>
                                    <option value="7">Aug(08)</option>
                                    <option value="8">Sep(09)</option>
                                    <option value="9">Oct(10)</option>
                                    <option value="10">Nov(11)</option>
                                    <option value="12">Dec(12)</option>
                                </select>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option selected>2019</option>
                                        <option value="1">2020</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                <div class="form-group">
                                    <label for="inputPassword6">เลข CVV</label>
                                    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                                    <small id="passwordHelpInline" class="text-muted">
                                    
                                    </small>
                                </div>
                        </div>
                        <div action="{{route('orders.store') }}" method="POST">
                                @csrf
                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2"> 
                            <div class="accordion" id="accordionExample">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           ช่องทางการโอนเงิน
                                          </button>
                                        </h2>
                                      </div>
                                  
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                         
                                                
                                                        <table class="table table-borderless">
                                                                <thead>
                                                                  <tr>
                                                                    <td scope="col" style="margin:0%;padding-bottom:0%;"><img class="d-block" src="{{ asset('hiwpro/images/b1.png')}}"></td>
                                                                    <td scope="col">ธนาคารกสิกร</td>
                                                                    <td scope="col">บริษัท หิ้วโปร จำกัด</td>
                                                                    <td scope="col">635-2-25202-4</td>
                                                                    <td scope="col">เมืองทองธานี</td>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td scope="col" style="margin:0%;padding-bottom:0%;"><img class="d-block" src="{{ asset('hiwpro/images/b2.png')}}"></td>
                                                                        <td scope="col">ธนาคารกรุงเทพ</td>
                                                                        <td scope="col">บริษัท หิ้วโปร จำกัด</td>
                                                                        <td scope="col">232-4-77272-8</td>
                                                                        <td scope="col">เมืองทองธานี</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td scope="col" style="margin:0%;padding-bottom:0%;"><img class="d-block" src="{{ asset('hiwpro/images/b3.png')}}"></td>
                                                                        <td scope="col">ธนาคารไทยพาณิชย์</td>
                                                                        <td scope="col">บริษัท หิ้วโปร จำกัด</td>
                                                                        <td scope="col">164-236437-9</td>
                                                                        <td scope="col">เมืองทองธานี</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td scope="col" style="margin:0%;padding-bottom:0%;"><img class="d-block" src="{{ asset('hiwpro/images/b4.jpg')}}"></td>
                                                                        <td scope="col">ธนาคารกรุงศรีอยุธยา</td>
                                                                        <td scope="col">บริษัท หิ้วโปร จำกัด</td>
                                                                        <td scope="col">659-1-04448-3</td>
                                                                        <td scope="col">เมืองทองธานี</td>
                                                                      </tr>
                                                                      <tr>
                                                                        <td scope="col" style="margin:0%;padding-bottom:0%;"><img class="d-block" src="{{ asset('hiwpro/images/b5.png')}}"></td>
                                                                        <td scope="col">ธนาคารกรุงไทย</td>
                                                                        <td scope="col">บริษัท หิ้วโปร จำกัด</td>
                                                                        <td scope="col">983-1-25243-8</td>
                                                                        <td scope="col">เมืองทองธานี</td>
                                                                      </tr>
                            
                                                                </tbody>
                                                              </table>
                                                              <br>
                                                            <span>
                                                                <font color="red">*</font>
                                                                หลังจากโอนเงินชำระค่าสินค้าเรียบร้อยแล้ว รบกวนลูกค้าแจ้งชำระเงินโดยส่งหลักฐาน 
                                                                <br> การชำระเงินพร้อมระบุเลขที่สั่งซื้อมาที่ช่องทางด้านล่างนี้ (เพียงหนึ่งช่องทาง)
                                                            
                                                                                        
                                                            <br><font color="red">อัพโหลดใบเสร็จ</font> : บัญชีของฉัน > ออเดอร์ของฉัน > เลือกออเดอร์ที่ต้องการแจ้งชำระ > แจ้งชำระเงิน
                                                            <br>อีเมล: Support@hiwpro.com  อินบ็อก: Facebook.com/hiwpro
                                                            <br>(กรุณาเก็บเอกสารการชำระเงินไว้เพื่อเป็นหลักฐาน)
                                                            </span>
                                                    
                                        </div>
                                      </div>
                                    </div>
                                  
                            </div>




                        
                                {{-- shadow --}}
                      
            <div class="shadow-sm p-3 mb-5 bg-white rounded"> 
                <form method="POST" enctype="multipart/form-data"
                action="{{route('confirms.payment.store', [$orderHeaders->order_number])}}">
                        {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-form-label">
                            <h4>
                            <span>จำนวนเงินที่ต้องชำระ ยอด 
                                <font color="red">{{ $orderHeaders->total_price}} </font> บาท
                            </span></h4>
                        </label>
                        
                    </div>
                        <div class="row">
                           
                        
                           <div class="col-md-6">   <div class="form-inline">
                                <div class="form-group">
                                  <label for="inputname_card" style="margin-left:10px;">โอนเงินจากธนาคาร : </label>
                                    <select name="bank_from"  class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="ธนาคารกรุงเทพ" selected>ธนาคารกรุงเทพ</option>
                                        <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                        <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                        <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                        <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                        <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                                        <option value="ธนาคารซิติแบงก์">ธนาคารซิติแบงก์</option>
                                        <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบี ไทย</option>
                                        <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                                        <option value="ธนาคารนครหลวงไทย">ธนาคารนครหลวงไทย</option>
                                        <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                        <option value="ธนาคารไอซีบีซี">ธนาคารไอซีบีซี (ไทย)</option>
                                        <option value="ธนาคารอื่นๆ">ธนาคารอื่นๆ</option>
                                        
                                    </select>                               
                                </div>
                            </div> </div>
                                <div class="form-inline w-100 col-md-12">
                                    <div class="form-group">
                                    <label class="w-5" for="inputname_card">เข้าบัญชีธนาคาร :  </label>
                                    <select name="bank_to"   class="custom-select " id="inlineFormCustomSelectPref">
                                            <option value="ธนาคารกสิกรไทย" selected>ธนาคารกสิกรไทย  - (KBANK) (033-3-94465-0)</option>
                                            <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ - (TCAT CO.,LTD.) (924-0-14969-1)</option>
                                            <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์  - (SCB) (365-219882-5)</option>
                                            <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา  - (AYS) (528-1-10158-5)</option>
                                            <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย  - (KTB) (795-0-11014-7)</option>
                                    </select>                               
                                    </div>
                                </div>
                           <br>
                            <div class="form-inline w-100 col-md-12" style="width: 300px;">
                                <div class="input-group-prepend">
                                <label  class=" w-5" for="inputname_card">จำนวนเงิน :  </label>
                                  <span class="input-group-text">$</span>
                                </div>
                                <input name="total"  type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                  <span class="input-group-text">.00</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                           
                        </div>
                        
                        
                              <!-- Imgpath Field -->
                    <div class="form-group col-sm-6">
                            {!! Form::label('img_path', 'Imgpath') !!}
                            {!! Form::file('img_path') !!}
                    </div>
                    <div class="clearfix"></div>
                        วัน และเวลาที่โอน
                    <div class="form-group col-sm-6">
                            {!! Form::label('send_time', 'เวลาที่โอน:') !!}
                            {!! Form::text('send_time', null, ['class' => 'form-control date-picker']) !!}
                    </div>
                        ชื่อบัญชีผู้โอน
                       
                    </div>
                    <button type="submit"> ยืนยัน </button>
                </form>


            </div>
                </div>
            {{-- </div> --}}
        
    </div>
    {{-- weapper --}}
</div>
{{-- container --}}



@endsection

@section('scripts')
<script>
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