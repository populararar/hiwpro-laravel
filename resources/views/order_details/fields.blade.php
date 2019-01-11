<!-- Qrt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qrt', 'Qrt:') !!}
    {!! Form::text('qrt', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Option Field -->
<div class="form-group col-sm-6">
    {!! Form::label('option', 'Option:') !!}
    {!! Form::text('option', null, ['class' => 'form-control']) !!}
</div>

<!-- Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fee', 'Fee:') !!}
    {!! Form::text('fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_rate', 'Shipping Rate:') !!}
    {!! Form::text('shipping_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Header Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_header_id', 'Order Header Id:') !!}
    {!! Form::date('order_header_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
