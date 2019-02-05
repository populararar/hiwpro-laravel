<div class="col-sm-12">
    <input type="hidden" name="form-detail" value="true" />
    @foreach($orderDetails as $key => $item)
    <div class="form-inline" style="padding:5px">
        {{-- {{dd($key,$item->id)}} --}}
        <input
            type="hidden"
            name="detail_id[{{ $key }}]"
            value="{{ $item->id }}"
        />
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input
                type="text"
                class="form-control"
                value="{{ $item->product->name }}"
                readonly
            />
        </div>

        <div class="form-group">
            <label for="required_amount">Required Qty</label>
            <input
                type="number"
                class="form-control"
                value="{{ $item->qrt }}"
                readonly
            />
        </div>
        @if($item->seller_actual_status == 0)
        <div class="form-group">
            <label for="required_amount">Actual Qty</label>
            <input
                type="number"
                name="seller_actual_qty[{{ $key }}]"
                class="form-control"
                value="{{ $item->seller_actual_qty }}"
            />
        </div>
        @else
        <div class="form-group">
            <label for="required_amount">Actual Qty</label>
            <input
                type="number"
                class="form-control"
                value="{{  $item->seller_actual_qty }}"
                disabled
            />
        </div>
        @endif
    </div>
    @endforeach
    <!-- Submit Field -->
</div>

<div class="form-group col-sm-12">
    @php
        $disable = $orderDetails->first()->seller_actual_status != 0 ? true : false
    @endphp
    {!! Form::submit('Save', ['class' => 'btn btn-primary' , 'disabled'=> $disable]) !!}
    <a href="{!! route('orderSellers.index') !!}" class="btn btn-default"
        >Cancel</a
    >
</div>
