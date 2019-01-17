<!-- Img Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_path', 'Img Path:') !!}
    {!! Form::text('img_path', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Bank From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_from', 'Bank From:') !!}
    {!! Form::text('bank_from', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Bank To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_to', 'Bank To:') !!}
    {!! Form::text('bank_to', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
</div>
