
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
<style>
h5{
    font-family: Kanit;
    font-weight: bolder;
}
</style>

<div class="col-12">
    <p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        รายละเอียดสินค้า</a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
           {{-- {{$orderHeaders->orderDetails->}} --}}
           @foreach ($orderHeader->orderDetails as $orderdetail)
            <div class="shadow  mb-5 bg-white rounded">
                <div class="row">
                <div class="col-md-5">
                    <img class='card-img-top' style="width:150px;" src="{{ asset('/storage/'.$orderdetail->product->image_product_id) }}">
                </div>
                <div class="col-md-7 " style="padding-top:2%;">
                    <h5  style="border-left:5px solid #df3433;padding-left:5px;">ชื่อสินค้า : {{$orderdetail->product->name}}</h5>
                    <p> ประเภทสินค้า : เครื่องสำอางค์</p>
                    <p> ชื่อผู้หิ้ว : {{$orderdetail->seller->name }}</p>
                    <p> จำนวน {{$orderdetail->qrt }} ชิ้น</p>
                    <p> ราคา {{$orderdetail->product->price}} บาท</p>
                    <p> ค่าหิ้ว {{$orderdetail->product->fee}} บาท</p>
                    <p> ค่าส่ง {{$orderdetail->product->shipping_price}} บาท</p>
                    <p> ร้านค้า {{$orderdetail->product->shop->name}} บาท</p>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    

    
<!-- Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orderHeader->id !!}</p>
</div>

<!-- Address Field -->
<div class="form-group  col-md-6">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $orderHeader->address !!}</p>
</div>

<!-- Order Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('order_date', 'Order Date:') !!}
    <p>{!! $orderHeader->order_date !!}</p>
</div>

<!-- Exp Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('exp_date', 'Exp Date:') !!}
    <p>{!! $orderHeader->exp_date !!}</p>
</div>

<!-- Slip Status Field -->
<div class="form-group  col-md-6">
    {!! Form::label('slip_status', 'Slip Status:') !!}
    <p>{!! $orderHeader->slip_status !!}</p>
</div>

<!-- Total Price Field -->
<div class="form-group  col-md-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{!! $orderHeader->total_price !!}</p>
</div>

<!-- Tracking Number Field -->
<div class="form-group  col-md-6">
    {!! Form::label('tracking_number', 'Tracking Number:') !!}
    <p>{!! $orderHeader->tracking_number !!}</p>
</div>



<!-- Customer Id Field -->
<div class="form-group  col-md-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{!! $orderHeader->customer_id !!}</p>
</div>

<!-- Shipping Id Field -->
<div class="form-group  col-md-6">
    {!! Form::label('shipping_id', 'Shipping Id:') !!}
    <p>{!! $orderHeader->shipping_id !!}</p>
</div>

<!-- Shipping Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('shipping_date', 'Shipping Date:') !!}
    <p>{!! $orderHeader->shipping_date !!}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{!! $orderHeader->payment_date !!}</p>
</div>

<!-- Accepted Date Field -->
<div class="form-group  col-md-6">
    {!! Form::label('accepted_date', 'Accepted Date:') !!}
    <p>{!! $orderHeader->accepted_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group  col-md-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $orderHeader->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group  col-md-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orderHeader->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group  col-md-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orderHeader->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group  col-md-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orderHeader->deleted_at !!}</p>
</div>

