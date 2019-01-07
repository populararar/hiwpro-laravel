<!-- Category Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_name', 'Category Name:') !!}
    {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Shop name', 'Shop name:') !!}
    {{-- {!! Form::select('shop_id',$shops->shop_id->name, ['class' => 'form-control']) !!} --}}

    @if(!empty($category->shop_id))
    {!! Form::select('shop_id',$shops, $category->shop_id, ['class' => 'form-control select2 shop_id']) !!}
    @else
    {!! Form::select('shop_id',$shops, null, ['class' => 'form-control select2 shop_id']) !!}
    @endif
</div>

{{-- --------------------------- --}}
<!-- Event Id Field -->
{{-- @if(empty($eventShop->event->event_id))
<div class="form-group col-sm-6">
    {!! Form::label('Shop name', 'Shop name:') !!}
    {!!Form::select('shop_id',$events, null, ['class' => 'form-control select2 event_id']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('event_id', 'Event Id:') !!}
    {!!Form::select('event_id',$events, $eventShop->event->event_id, ['class' => 'form-control select2 event_id']) !!}
</div>
@endif --}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>