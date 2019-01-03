@extends('layouts.hiwpro')

@section('content')
<style>
    .qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 25px;
    font-weight: 700;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
}
.qty .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    }
.qty .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}
.minus:hover{
    background-color: #717fe0 !important;
}
.plus:hover{
    background-color: #717fe0 !important;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
input{  
    border: 0;
    width: 2%;
}
nput::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}
</style>
<div class="container">


    <h1>Product detail</h1>
    <div class="row">

        <div class="col-4">
            <img class="card-img-top" style="margin:5% 0 5% 20%; width:300px; border-radius: 10%" src="{{ asset('/storage/'.$product->image_product_id) }}">
        </div>

    
        <div class="col-8" style="padding:5%;">
            <form action="{{ route('cart.add') }}" method="POST">
                    {!! csrf_field() !!}
                <input type="hidden" name="event_shop_id" value="{{ $eventShop->id }}">
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <h4 style='color:#df3433; font-size:1.8em;line-height : 0;margin:0%;'>{{ $product->name }}</h4><br>
                <br>
                <p style='color:333;'>{{ $product->productdetail }}</p>
                จำนวน <br>
                <div class="qty mt-5">
                    <span class="minus bg-dark">-</span>
                    <input type="number" class="count" name="quantity" value="1">
                    <span class="plus bg-dark">+</span>
                </div>
                <small style='color:#555;font-size:0.8em;line-height : 1;padding:0%;margin:0%;'>ราคา </small>
                <input type="hidden" name="price" value="{{  $product->price  }}">
                <h4>{{ $product->price }} บาท</h4>

                <div class='row'>
                    <div class='col-6'>
                        <input type="hidden" name="fee" value="{{  $product->fee  }}">
                        ค่าหิ้ว {{ $product->fee }} บาท/ชิ้น
                    </div>
                    <div class='col-6'>
                        <input type="hidden" name="shippping" value="{{  $product->shipping_price  }}">
                        ค่าจัดส่ง {{ $product->shipping_price }} บาท
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-heart"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- container --}}
@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        $(document).on('click', '.plus', function () {
            $('.count').val(parseInt($('.count').val()) + 1);
        });


        $(document).on('click', '.minus', function () {
            $('.count').val(parseInt($('.count').val()) - 1);
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    });
</script>
@endsection