<link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>#{!! $shop->shop_id !!} {!! $shop->name !!}</p>
</div>

<!-- Detail Field -->
<div class="form-group">
    {!! Form::label('detail', 'Detail:') !!}
    <p>{!! $shop->detail !!}</p>
</div>

<!-- Location Location Id Field -->
<div class="form-group">
    {!! Form::label('location_location', 'Location name:') !!}
    <p>{!! $shop->location->location_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $shop->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $shop->updated_at !!}</p>
</div>

<div class="row">
    <div class="col-md-6" style=" border-bottom:1px solid #5555">
      <h4><strong style="font-family:kanit; border-bottom: 2px solid #cf2132;"> Product in shop</strong></h4> 
    </div>
    <div class="col-md-6">
        <div style="float:right;margin:0 10% 0 0;"> Add Category in shop <a  href="{!! route('categories.create', ['shop_id'=>$shop->shop_id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="col-md-6">
        <div style="float:right;margin:0 10% 0 0;"> Add Product in shop <a  href="{!! route('products.build', ['shop_id'=>$shop->shop_id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-plus"></i></a>
    </div>
</div>

</div> 

<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th style="width:15%;">Name</th>
        <th style="width:10%;">Shop</th>
        <th style="width:5%;">Price</th>
        <th style="width:30%;">Productdetail</th>
        <th style="width:5%;">Fee</th>
        <th style="width:5%;">Shipping Price</th>
        <th style="width:5%;">Actual Price</th>
        <th style="width:10%;">Image Product</th>
        <th style="width:5%;">Category Id</th>
        
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            {{-- {{ dd( $product->shop) }} --}}
            <td>{!! $product->name !!}</td>
            <td>{!! $product->shop->name !!}</td>
            <td>{!! $product->price !!}</td>
            <td>{!! $product->productdetail !!}</td>
            <td>{!! $product->fee !!}</td>
            <td>{!! $product->shipping_price !!}</td>
            <td>{!! $product->actual_price !!}</td>
            <td><img src="{{ asset('/storage/'.$product->image_product_id) }}" alt="" width="50"></td>
    
            <td>{!! $product->category_id !!}</td>
        
        </tr>
    @endforeach
    </tbody>
</table>
