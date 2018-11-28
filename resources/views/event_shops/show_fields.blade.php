<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $eventShop->id !!}</p>
</div>

<!-- Event Id Field -->
<div class="form-group">
    {!! Form::label('event_id', 'Event Id:') !!}
    <p>{!! $eventShop->event_id !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('shop_id', 'Shop Id:') !!}
    <p>{!! $eventShop->shop_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $eventShop->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $eventShop->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $eventShop->deleted_at !!}</p>
</div>

