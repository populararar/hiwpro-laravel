

<div class="form-group col-md-5">
    {!! Form::label('img_path', 'Imgpath:') !!}
    <p><img src="{{ asset('/storage/'.$payment->img_path) }}" alt="" width="350px"></p>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        รายละเอียดลูกค้า
      </button>
      
      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดการจัดส่ง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>{{$payment->order->address}}</p>
                    <p>{{$payment->order->order_date}}</p>
                    <p>{{$payment->order->slip_status}}</p>
                    <p>{{$payment->order->exp_date}}</p>
                    <p>{{$payment->order->total_price}}</p>
                    <p>{{$payment->order->tracking_number}}</p>
                    <p>{{$payment->order->customer_id}}</p>
                    <p>{{$payment->order->shipping_id}}</p>
                    <p>{{$payment->order->shipping_date}}</p>
                    <p>{{$payment->order->payment_date}}</p>
                    <p>{{$payment->order->accepted_date}}</p>
                    <p>{{$payment->order->status}}</p>
                    <p>{{$payment->order->order_number}}</p>
                    <p>{{$payment->order->seller_id}}</p>
                    <p>{{$payment->order->name}}</p>
                    <p>{{$payment->order->lastname}}</p>
                    <p>{{$payment->order->email}}</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{-- {{dd($payment->order)}} --}}

  

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#oederDetail">
        รายละเอียดสินค้า
      </button>
      
      <!-- Modal -->
    <div class="modal fade" id="oederDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="oederDetail">รายละเอียดสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    @php
                        $sum=0;
                    @endphp
                @foreach($payment->order->orderDetails as $item)
                {{-- {{dd($item)}} --}}
                @php
                    $qrt = $item->qrt;
                    $price = $item->price;
                    $shipping = $item->shipping_rate;
                    $fee = $item->fee;
                    $total = ($price+$shipping+$fee)*$qrt;

                    $formattedNum = number_format($total); 

                @endphp
                <div class="shadow-sm  mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-md-5">
                        <img class='card-img-top' style="width:50%; margin-left:20%;" src="{{ asset('/storage/'.$item->product->image_product_id) }}">
                    </div>
                    <div class="col-md-7 " style="padding-top:2%;">
                    <h3 style="border-left:5px solid #df3433; padding-left: 5px;">ชื่อสินค้า : {{$item->product->name}}</h3>
                        <p>ประเภทสินค้า : เครื่องสำอางค์</p>
                        <p>ชื่อผู้หิ้ว : {{$item->seller->name }}</p>
                        <p>จำนวน {{$qrt}} ชิ้น</p>
                        <p>ค่าหิ้ว {{$fee}} /ชิ้น</p>
                        <p>ค่าส่ง {{$shipping}} /ชิ้น</p>
                        <p>ราคา {{$price}} /ชิ้น</p>
                        <p>รวม {{ $formattedNum }} บาท</p>
                    </div>
                </div>
                </div>
                @php
                    $sum+=$total;
                @endphp
                @endforeach
                
                <p style="font-size:1.5em; color:#df3433; font-style:bold;">ราคารวม {{number_format($sum)}} บาท</p>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<div class="col-sm-6" style="margin-top:2%;">
    <div class="row">
        <label >Order number</label>
        <p>{{$payment->order->order_number}}</p>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label for="bank_from">โอนมาจาก</label>
            {!! Form::text('bank_from', null, ['class' => 'form-control','readonly'=>true]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('bank_to', 'เข้ามาธนาคาร') !!}
            {!! Form::text('bank_to', null, ['class' => 'form-control','readonly'=>true]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label for="bank_from">ยอด</label>
            {!! Form::text('total', null, ['class' => 'form-control','readonly'=>true]) !!}
           
        </div>
        <div class="col-sm-6">           
            <label for="bank_from">เวลาโอน</label>
            {!! Form::text('send_time', null, ['class' => 'form-control','readonly'=>true]) !!}
        </div>
    </div>

    <div class="form-group col-sm-6" style="margin-top:3%;">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#report">
       REPORT
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="report" style="font-family:'Kanit';">send to {{$payment->order->email}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                หลักฐานในการชำระเงินไม่ถูกต้องส่งข้อความให้ลูกค้าตรวจสอบการชำระเงินอีกครั้ง
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              {{-- Mail::to($customerEmail)->send(new OrderShipped($order, 'NO_COMPLETE')); --}}
              {{-- <aclass="btn btn-xs btn-info pull-right">Edit</a> --}}
            {{-- {{dd($payment->order->order_number)}} --}}
              <button href="{{ url('/payment/' . $payment->order->id. '/sendmail') }}"  type="button" class="btn btn-primary">Send mail</button>
            </div>
          </div>
        </div>
      </div>

        {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
    </div>

</div>




<div class="clearfix"></div>


<!-- Submit Field -->
