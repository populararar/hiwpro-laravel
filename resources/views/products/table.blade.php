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
        <th colspan="3" style="width:15%;">Action</th>
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
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->product_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', ['product' => $product->product_id , 'shop_id' => $shop_id ]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('products.edit', ['product' => $product->product_id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>