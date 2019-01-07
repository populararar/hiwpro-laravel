<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $productevent->id !!}</p>
</div>

<!-- Sale Price Field -->
<div class="form-group">
    {!! Form::label('sale_price', 'Sale Price:') !!}
    <p>{!! $productevent->sale_price !!}</p>
</div>

<!-- Event Shop Id Field -->
<div class="form-group">
    {!! Form::label('event_shop_id', 'Event Shop Id:') !!}
    <p>{!! $productevent->event_shop_id !!}</p>
</div>

<!-- Promotion Id Field -->
<div class="form-group">
    {!! Form::label('promotion_id', 'Promotion Id:') !!}
    <p>{!! $productevent->promotion_id !!}</p>
</div>

{{-- <!-- Imgpath Field -->
<div class="form-group">
    {!! Form::label('image_product_id', 'Imgpath:') !!}
    <p><img src="{{ asset('/storage/'.$product->image_product_id) }}" alt="" width="250"></p>
</div> --}}


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $productevent->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $productevent->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $productevent->deleted_at !!}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{!! $productevent->product_id !!}</p>
</div>

