<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $payment->id !!}</p>
</div>

<!-- Img Path Field -->
<div class="form-group">
    {!! Form::label('img_path', 'Img Path:') !!}
    <p>{!! $payment->img_path !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $payment->total !!}</p>
</div>

<!-- Bank From Field -->
<div class="form-group">
    {!! Form::label('bank_from', 'Bank From:') !!}
    <p>{!! $payment->bank_from !!}</p>
</div>

<!-- Bank To Field -->
<div class="form-group">
    {!! Form::label('bank_to', 'Bank To:') !!}
    <p>{!! $payment->bank_to !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $payment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $payment->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $payment->deleted_at !!}</p>
</div>

