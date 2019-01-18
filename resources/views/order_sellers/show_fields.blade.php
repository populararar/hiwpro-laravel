@foreach ($orderHeader->orderDetails as $orderdetail)
{{$orderdetail->product->name}}

{{$orderdetail->product->name}}
{{$orderdetail->product->price}}
{{$orderdetail->product->productdetail}}
{{$orderdetail->product->fee}}
{{$orderdetail->product->shipping_price}}
{{$orderdetail->product->shop->name}}

    
@endforeach
    
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orderHeader->id !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $orderHeader->address !!}</p>
</div>

<!-- Order Date Field -->
<div class="form-group">
    {!! Form::label('order_date', 'Order Date:') !!}
    <p>{!! $orderHeader->order_date !!}</p>
</div>

<!-- Exp Date Field -->
<div class="form-group">
    {!! Form::label('exp_date', 'Exp Date:') !!}
    <p>{!! $orderHeader->exp_date !!}</p>
</div>

<!-- Slip Status Field -->
<div class="form-group">
    {!! Form::label('slip_status', 'Slip Status:') !!}
    <p>{!! $orderHeader->slip_status !!}</p>
</div>

<!-- Total Price Field -->
<div class="form-group">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{!! $orderHeader->total_price !!}</p>
</div>

<!-- Tracking Number Field -->
<div class="form-group">
    {!! Form::label('tracking_number', 'Tracking Number:') !!}
    <p>{!! $orderHeader->tracking_number !!}</p>
</div>



<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{!! $orderHeader->customer_id !!}</p>
</div>

<!-- Shipping Id Field -->
<div class="form-group">
    {!! Form::label('shipping_id', 'Shipping Id:') !!}
    <p>{!! $orderHeader->shipping_id !!}</p>
</div>

<!-- Shipping Date Field -->
<div class="form-group">
    {!! Form::label('shipping_date', 'Shipping Date:') !!}
    <p>{!! $orderHeader->shipping_date !!}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{!! $orderHeader->payment_date !!}</p>
</div>

<!-- Accepted Date Field -->
<div class="form-group">
    {!! Form::label('accepted_date', 'Accepted Date:') !!}
    <p>{!! $orderHeader->accepted_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $orderHeader->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orderHeader->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orderHeader->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orderHeader->deleted_at !!}</p>
</div>

