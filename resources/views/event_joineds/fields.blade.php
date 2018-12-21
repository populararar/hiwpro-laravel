<!-- Seller Seller Id Field -->
<!-- Event Id Field -->
<div class="col-sm-12" style="padding-left: 20px">
    @include('event_joineds.show_fields')
</div>
<div class="col-sm-12">
    @foreach ($eventShops as $eventShop)
    <div class="form-group col-sm-12">
        {!! Form::label('event_shop_id', 'Event Shop Id:') !!}
        {!! Form::checkbox('shop_id[]', $eventShop->id , null) !!}
        {!! $eventShop->shop->name !!}
    </div>
    @endforeach
</div>
<!-- Event Shop Id Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventJoineds.index') !!}" class="btn btn-default">Cancel</a>
</div>