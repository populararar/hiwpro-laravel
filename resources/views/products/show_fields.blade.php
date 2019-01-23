
<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{!! $product->product_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $product->name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $product->price !!}</p>
</div>

<!-- Productdetail Field -->
<div class="form-group">
    {!! Form::label('productdetail', 'Productdetail:') !!}
    <p>{!! $product->productdetail !!}</p>
</div>

<!-- Fee Field -->
<div class="form-group">
    {!! Form::label('fee', 'ค่าหิ้ว :') !!}
    <p>{!! $product->fee !!}</p>
</div>

<!-- Product Expired Field -->
<div class="form-group">
    {!! Form::label('product_expired', 'Product Expired:') !!}
    <p>{!! $product->product_expired !!}</p>
</div>

<!-- Shipping Price Field -->
<div class="form-group">
    {!! Form::label('shipping_price', 'ค่าส่ง :') !!}
    <p>{!! $product->shipping_price !!}</p>
</div>

<!-- Actual Price Field -->
<div class="form-group">
    {!! Form::label('actual_price', 'ราคาเต็ม:') !!}
    <p>{!! $product->actual_price !!}</p>
</div>

<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_product_id', 'รูปที่ 1 :') !!}
    <p><img src="{{ asset('/storage/'.$product->image_product_id) }}" alt="" width="250"></p>
</div>


<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_product', 'รูปที่ 2 :') !!}
    <p><img src="{{ asset('/storage/'.$product->img_product) }}" alt="" width="250"></p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{!! $product->category_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $product->created_at !!}</p>
</div>
<span>updated_at</span>
<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $product->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $product->deleted_at !!}</p>
</div>

