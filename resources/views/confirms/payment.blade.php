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
.btnS{
    margin: auto;
    width: 30%;
}

</style>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}


<div class="container">
    @php
            $num = $orderHeaders->total_price;
            $formattedNum = number_format($num);

            $status = $orderHeaders->slip_status;
            // dd($status);
            if ($status == "WAITING") {
                # code...
                $status ='รอการชำระเงิน';
            }
        @endphp

<div class="weapper" style=" padding:3%; ">
    <h1 style="margin-top: 2%; color: #df3433;"> <i class="fas fa-money-check-alt"></i></h1>
        <h1 style="margin-top: 2%; color: #df3433; font-weight:bolder;">ชำระเงิน </h1>
        <div style="width:50px;height:5px; background-color:#cf2132;margin:auto;"></div>

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
                        <span>{{$status}}</span>
                    </p>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <p>  
                        <span>ยอด : <font color="red">{{$formattedNum}}</font> บาท</span>
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
                        <span>kerry express thailand</span>
                    </p>
                </div>   
            </div>   
        </div>   
    
 

    <div class="accordion" id="accordionExample">
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
                        <div class="card card-body">
                                {{-- {{$orderHeaders->orderDetails->}} --}}
                                @foreach( $orderHeaders->orderDetails as $item)
                                 <div class="shadow-sm  mb-5 bg-white rounded">
                                     <div class="row">
                                     <div class="col-md-5">
                                         <img class='card-img-top w-50' src="{{ asset('/storage/'.$item->product->image_product_id) }}">
             
                                     </div>
                                     <div class="col-md-7 " style="padding-top:2%;">
                                         <h1  style="border-left:5px solid #df3433;">ชื่อสินค้า : {{$item->product->name}}</h1>
                                         <p> ประเภทสินค้า : เครื่องสำอางค์</p>
                                         <p> ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
                                         <p> จำนวน {{$item->qrt }} ชิ้น</p>
                                         <p> ราคา {{ number_format($item->price) }} บาท</p>
                                     </div>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ช่องทางการโอนเงิน
                    </button>
                </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                   
                    <div style="overflow-x:auto;">
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
                     </div>     
                            <br>
                            <span>
                                <font color="red">*</font>
                                หลังจากโอนเงินชำระค่าสินค้าเรียบร้อยแล้ว รบกวนลูกค้าแจ้งชำระเงินโดยส่งหลักฐาน 
                                <br> การชำระเงินพร้อมระบุเลขที่สั่งซื้อมาที่ช่องทางด้านล่างนี้ (เพียงหนึ่งช่องทาง)
                            
                                                        
                            <br><font color="red">อัพโหลดใบเสร็จ</font> : บัญชีของฉัน > ออเดอร์ของฉัน > เลือกออเดอร์ที่ต้องการแจ้งชำระ > แจ้งชำระเงิน
                            <br>อีเมล: Support@hiwpro.com  อินบ็อก: Facebook.com/hiwpro
                            <br>(กรุณาเก็บเอกสารการชำระเงินไว้เพื่อเป็นหลักฐาน)
                            </span>
                <div class=" p-3 mb-5 bg-white rounded"> 
                        <form method="POST" enctype="multipart/form-data"
                        action="{{route('confirms.payment.store', [$orderHeaders->order_number])}}">
                                {!! csrf_field() !!}
                        <label for="name" class="col-sm-12 col-form-label">
                            <h4>
                            <span>จำนวนเงินที่ต้องชำระยอด 
                                <font color="red">{{ $formattedNum}} </font> บาท
                            </span></h4>
                        </label>
                            
                        
                        
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">ชื่อบัญชีผู้โอน :</label></div>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="ชื่อ  - นามสกุล (ที่ตรงกับบัญชี)">
                            </div>
                        </div>
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">เลขบัญชี :</label></div>
                            <div class="col-md-6">
                                    <input type="text" style="width:15%; float:left; margin-right:2%;" class="form-control"  id="txtAc1" name="txtAc1" size="2" class="required" maxlength = "3" />
                                    <input type="text" style="width:10%; float:left; margin-right:2%;" class="form-control" id="txtAc2" name="txtAc2" size="2" class="required" maxlength = "1" />
                                    <input type="text" style="width:15%; float:left; margin-right:2%;" class="form-control" id="txtAc3" name="txtAc3" size="2" class="required" maxlength = "5" />
                                    <input type="text" style="width:10%; float:left;" class="form-control" id="txtAc4" name="txtAc4" size="2" class="required" maxlength = "1" /> * หมายเลขบัตร 10 หลัก                                      
                                    <input type="hidden" id="txtBank" name="bank_num" size="25"  value="Credit" />

                                {{-- <input type="text" name="bank_num" class="form-control" id="exampleInputName2" placeholder="กรุณาไส่ตัวเลข 10 หลัก"> --}}
                            </div>
                        </div>
        
                        
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="inputname_card" style="margin-left:10px;">โอนเงินจากธนาคาร : </label></div>
                            <div class="col-md-6">
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
                        </div>
                
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"> <label class="w-5" for="inputname_card">เข้าบัญชีธนาคาร :  </label></div>
                            <div class="col-md-6">
                                <select name="bank_to"   class="custom-select " id="inlineFormCustomSelectPref">
                                    <option value="ธนาคารกสิกรไทย" selected>ธนาคารกสิกรไทย  - (KBANK) (033-3-94465-0)</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ - (TCAT CO.,LTD.) (924-0-14969-1)</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์  - (SCB) (365-219882-5)</option>
                                    <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา  - (AYS) (528-1-10158-5)</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย  - (KTB) (795-0-11014-7)</option>
                                </select>   
                            </div>
                        </div>    
                        @php $price = $orderHeaders->total_price; @endphp
        
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label  class=" w-5" for="inputname_card">จำนวนเงิน : </label></div>
                            <div class="col-md-6">
                                <input name="total_show" type="text" class="form-control" value="{{ $formattedNum}} บาท" readonly="readonly">
                            <input name="total" type="hidden" class="form-control" value="{{$price}}" readonly="readonly">
                            </div>
                        </div>
        
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label  class=" w-5" for="inputname_card">แนปสลิป :  </label></div>
                            <div class="col-md-6">
                                <input name="img_path"  type="file" class="form-control">
                            </div>
                        </div>
        
                        <div class="clearfix"></div>
                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label  class=" w-5" for="inputname_card">เวลาที่โอน :  </label></div>
                            <div class="col-md-3">
                                <input name="send_time"  type="datetime-local" class="form-control">
                            </div>
                           
                        </div>
                        <div class="btnS"><button class="btn btn-danger" style="width:100%;" type="submit"> ยืนยัน </button></div>
                        </form>    
        
        
                    </div>
                        {{-- </div> --}}

                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            จ่ายเงินผ่านบัตร
                    </button>
                </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">

                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">ประเภทบัตร :</label></div>
                            <div class="col-md-6">
                                    <select  class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option value="0" selected>V-sa</option>
                                            <option value="1">Master card</option>
                                            
                                    </select> 
                            </div>
                        </div>

                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">ชื่อผู้ถือบัตร :</label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="ชื่อ  - นามสกุล (ที่ตรงกับบัญชี)">
                            </div>
                        </div>

                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">จ่ายเงินผ่านบัตร :</label></div>
                            <div class="col-md-6">
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

                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">เลขหน้าบัตร :</label></div>
                            <div class="col-md-6">
                                    <input type="text" style="width:15%; float:left; margin-right:2%;" class="form-control"  id="txtAc1" name="txtAc1" size="2" class="required" maxlength = "4" />
                                    <input type="text" style="width:15%; float:left; margin-right:2%;" class="form-control" id="txtAc2" name="txtAc2" size="2" class="required" maxlength = "4" />
                                    <input type="text" style="width:15%; float:left; margin-right:2%;" class="form-control" id="txtAc3" name="txtAc3" size="2" class="required" maxlength = "4" />
                                    <input type="text" style="width:15%; float:left;" class="form-control" id="txtAc4" name="txtAc4" size="2" class="required" maxlength = "4" /> * หมายเลขบัตร 16 หลัก                                      
                                    <input type="hidden" id="txtBank" name="txtBank" size="25"  value="Credit" />
                                {{-- <input type="teuxt" id="exampleInputName2" placeholder="เลขหน้าบัตร"> --}}
                            </div>
                        </div>

                        <div class="row" style="text-align:right;margin:2% 0%;">
                            <div class="col-md-4"><label for="exampleInputName2">วันหมดอายุ(ดด/ปป) :</label></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
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
                                    </div>
                                    <div class="col-md-3">
                                         <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected>2019</option>
                                            <option value="1">2020</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                            <input type="text" class="form-control" id="ccv" placeholder="เลข CVV">
                                    </div>

                                </div>
                                    
                                   
                                    
                            </div>
                        </div>


                        <div action="{{route('orders.store') }}" method="POST">
                                @csrf
                            <div class="btnS"><button class="btn btn-danger" style="width:100%;" type="submit"> ยืนยัน </button></div>
                        </div>
                </div>
                </div>
            </div>
            </div>

       
    </div>
    {{-- weapper --}}
</div>


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
    
    $(function () {
        $('.date-picker').datetimepicker({
           // format: 'YYYY-MM-DD'
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });

</script>
@endsection