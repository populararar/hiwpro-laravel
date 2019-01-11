<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_date', 'Order Date:') !!}
    {!! Form::date('order_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Exp Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exp_date', 'Exp Date:') !!}
    {!! Form::date('exp_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Slip Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slip_status', 'Slip Status:') !!}
    {!! Form::text('slip_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Tracking Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tracking_number', 'Tracking Number:') !!}
    {!! Form::text('tracking_number', null, ['class' => 'form-control']) !!}
</div>


<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_id', 'Shipping Id:') !!}
    {!! Form::text('shipping_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_date', 'Shipping Date:') !!}
    {!! Form::date('shipping_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Accepted Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accepted_date', 'Accepted Date:') !!}
    {!! Form::date('accepted_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderHeaders.index') !!}" class="btn btn-default">Cancel</a>
</div>
