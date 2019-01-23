<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menu_id', 'Menu Id:') !!}
    {!! Form::number('menu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Can Visible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('can_visible', 'Can Visible:') !!}
    {!! Form::number('can_visible', null, ['class' => 'form-control']) !!}
</div>

<!-- Can Show Field -->
<div class="form-group col-sm-6">
        {!! Form::label('can_read', 'Can read:') !!}
        {!! Form::number('can_read', null, ['class' => 'form-control']) !!}
    </div>

<!-- Can Create Field -->
<div class="form-group col-sm-6">
    {!! Form::label('can_create', 'Can Create:') !!}
    {!! Form::number('can_create', null, ['class' => 'form-control']) !!}
</div>

<!-- Can Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('can_update', 'Can Update:') !!}
    {!! Form::number('can_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Can Delete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('can_delete', 'Can Delete:') !!}
    {!! Form::number('can_delete', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permissions.index') !!}" class="btn btn-default">Cancel</a>
</div>
