<!-- Location Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_name', 'Location Name:') !!}
    {!! Form::text('location_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch', 'Branch:') !!}
    {!! Form::text('branch', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province', 'Province:') !!}
    {!! Form::text('province', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('locations.index') !!}" class="btn btn-default">Cancel</a>
</div>
