<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{!! $category->category_id !!}</p>
</div>

<!-- Category Name Field -->
<div class="form-group">
    {!! Form::label('category_name', 'Category Name:') !!}
    <p>{!! $category->category_name !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group">
    {!! Form::label('shop_id', 'Shop Id:') !!}
    <p>{!! $category->shop_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $category->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $category->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $category->deleted_at !!}</p>
</div>

