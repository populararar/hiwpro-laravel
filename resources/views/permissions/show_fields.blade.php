<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $permissions->id !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{!! $permissions->role_id !!}</p>
</div>

<!-- Menu Id Field -->
<div class="form-group">
    {!! Form::label('menu_id', 'Menu Id:') !!}
    <p>{!! $permissions->menu_id !!}</p>
</div>

<!-- Can Visible Field -->
<div class="form-group">
    {!! Form::label('can_visible', 'Can Visible:') !!}
    <p>{!! $permissions->can_visible !!}</p>
</div>

<!-- Can Create Field -->
<div class="form-group">
    {!! Form::label('can_create', 'Can Create:') !!}
    <p>{!! $permissions->can_create !!}</p>
</div>

<!-- Can Update Field -->
<div class="form-group">
    {!! Form::label('can_update', 'Can Update:') !!}
    <p>{!! $permissions->can_update !!}</p>
</div>

<!-- Can Delete Field -->
<div class="form-group">
    {!! Form::label('can_delete', 'Can Delete:') !!}
    <p>{!! $permissions->can_delete !!}</p>
</div>

<!-- Can Show Field -->
<div class="form-group">
    {!! Form::label('can_show', 'Can Show:') !!}
    <p>{!! $permissions->can_show !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $permissions->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $permissions->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $permissions->deleted_at !!}</p>
</div>

