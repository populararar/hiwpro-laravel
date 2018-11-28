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

    <div class="clearfix"></div>
<div class="form-group col-sm-6">
    {!! Form::label('image_product_id', 'Ass Imgpath:') !!}
    {!! Form::hidden('image_product_id', $product->image_product_id,[]) !!}
    <img src="{{ asset('/storage/'.$product->image_product_id) }}" alt="" width="250">
</div>

<div class="clearfix"></div>

<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_product_id', 'Img path:') !!}
    {!! Form::file('image_product_idUpdate') !!}
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


@section('scripts')
    <script>
    // In your Javascript (external .js resource or <script> tag)
    // $(document).ready(function() {
    //     $('#robots').select2();
    // });

    $(function () {
        $('.date-picker').datetimepicker({
           // format: 'YYYY-MM-DD HH:mm:ss'
            format: 'YYYY-MM-DD'
        });
    });
    </script>
@endsection
