<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Productdetail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productdetail', 'Productdetail:') !!}
    {!! Form::text('productdetail', null, ['class' => 'form-control']) !!}
</div>

<!-- Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fee', 'Fee:') !!}
    {!! Form::text('fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_price', 'Shipping Price:') !!}
    {!! Form::text('shipping_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Actual Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actual_price', 'Actual Price:') !!}
    {!! Form::text('actual_price', null, ['class' => 'form-control']) !!}
</div>
<!-- Product Event Idproduct Event Field -->
<div class="form-group col-sm-6">
        {!! Form::label('shop_name', 'Shop name:') !!}
        {!! Form::hidden('shop_id', $shop->shop_id, ['class' => 'form-control']) !!}
        {!! Form::text('shop_name', $shop->name, ['class' => 'form-control','readonly' => true]) !!}
    </div>

<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_product_id', 'Add image:') !!}
    {!! Form::file('image_product_id') !!}
</div>

<div class="clearfix"></div>

<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_product', 'Add image 2:') !!}
    {!! Form::file('img_product') !!}
</div>
<div class="clearfix"></div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {{-- {!! Form::text('category_id', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('category_id',$categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index', ['shop_id' => $shop->shop_id] ) !!}" class="btn btn-default">Cancel</a>
</div>
