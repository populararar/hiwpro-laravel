

<div class="form-group col-md-6">
    {!! Form::label('img_path', 'Imgpath:') !!}
    <p><img src="{{ asset('/storage/'.$payment->img_path) }}" alt="" width="400px"></p>
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

<!-- Bank To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Bank To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('send_time', 'send_time:') !!}
    {!! Form::text('send_time', null, ['class' => 'form-control','readonly'=>true]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
</div>
