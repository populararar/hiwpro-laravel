<style>


    .inputGroup {
  background-color: #fff;
  display: block;
  margin: 10px 0;
  position: relative;
}
.inputGroup label {
  padding: 12px 30px;
  width: 100%;
  display: block;
  text-align: left;
  color: #3C454C;
  cursor: pointer;
  position: relative;
  z-index: 2;
  transition: color 200ms ease-in;
  overflow: hidden;
}
.inputGroup label:before {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  content: '';
  background-color: #df3433;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
          transform: translate(-50%, -50%) scale3d(1, 1, 1);
  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  z-index: -1;
}
.inputGroup label:after {
  width: 32px;
  height: 32px;
  content: '';
  border: 2px solid #D1D7DC;
  background-color: #fff;
  background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
  background-repeat: no-repeat;
  background-position: 2px 3px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  cursor: pointer;
  transition: all 200ms ease-in;
}
.inputGroup input:checked ~ label {
  color: #fff;
}
.inputGroup input:checked ~ label:before {
  -webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
          transform: translate(-50%, -50%) scale3d(56, 56, 1);
  opacity: 1;
}
.inputGroup input:checked ~ label:after {
  background-color: #54E0C7;
  border-color: #54E0C7;
}
.inputGroup input {
  width: 32px;
  height: 32px;
  order: 1;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  cursor: pointer;
  visibility: hidden;
}

#product-form {
  /* padding: 0 16px; */
  max-width: 550px;
  margin: 5px auto;
  font-size: 18px;
  font-weight: 600;
  /* line-height: 36px; */
}



</style>


<!-- Sale Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_price', '% discount:') !!}
    {!! Form::text('sale_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Event Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_shop_id', 'Event Shop Id:') !!}
    {!! Form::text('event_shop_id', session('event_shop_id', 0) , ['class' => 'form-control' , 'readonly' => true]) !!}
</div>

<!-- Promotion Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('promotion_id', 'Promotion Id:') !!}
    {!! Form::text('promotion_id', null, ['class' => 'form-control']) !!}
</div> --}}

{{--
<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div> --}}
<!-- Promotion Id Field -->
<div class="form-group col-sm-12">
    <div class="container">
        <div class="wrapper">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Category
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form" id="product-form">
                                @isset($products)
                                @foreach ($products as $product)
                                <div class="inputGroup">
                                    <input id="option-{{ $product->product_id }}" name="productid[]" type="checkbox" value="{{ $product->product_id }}" />
                                    <label for="option-{{ $product->product_id }}">{{ $product->name }}</label>
                                </div>
                                @endforeach
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productevents.index.event', ['id' => $event_shop_id ]) !!}" class="btn btn-default">Cancel</a>
</div>