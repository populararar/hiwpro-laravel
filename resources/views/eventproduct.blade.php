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
    /* padding: 0 2px */
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}
.mt-5, .my-5 {
    margin-top: 0rem!important; 
}
/*
 CSS for the main interaction
*/
.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}

/*
 Styling
*/

.tabset > label {
  position: relative;
  display: inline-block;
  padding: 15px 15px 25px;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: #8d8d8d;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color: #06c;
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: #06c;
}

.tabset > input:checked + label {
  border-color: #ccc;
  border-bottom: 1px solid #fff;
  margin-bottom: -1px;
}

.tab-panel {
  padding: 30px 0;
  border-top: 1px solid #ccc;
}

/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}

.tabset {
  max-width: 65em;
}

.tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
    background: #bd2130;
}
.tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
    background: #bd2130;
}
.tabset > label:hover, .tabset > input:focus + label {
    color: #bd2130;
}
</style>
<div class="container">


    <h1>Product detail</h1>
    <div class="row">
        <div class="col-4">
                <input type="hidden" name="image_product_id" value="{{ $product->image_product_id }}">
            <img class="card-img-top" style="margin:5% 0 5% 20%; width:300px; border-radius: 10%" src="{{ asset('/storage/'.$product->image_product_id) }}">
        </div>

    
        <div class="col-8" style="padding:5%;">
            <form action="{{ route('cart.add') }}" method="POST">
                    {!! csrf_field() !!}
                <input type="hidden" name="event_shop_id" value="{{ $eventShop->id }}">
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <h4 style='color:#df3433; font-size:1.8em;line-height : 0;margin:0%;'>{{ $product->name }}</h4><br>
                <br>
                   จำนวน 
                <div class="qty mt-5" style="padding:0%;margin:0%;">
                    <span class="minus bg-dark">-</span>
                    <input type="number" class="count" name="quantity" value="1">
                    <span class="plus bg-dark">+</span>
                </div>
                <small style='color:#555;font-size:0.8em;line-height : 1;padding:0%;margin:0%;'>ราคา </small>
                <input type="hidden" name="price" value="{{  $product->price  }}">
                <h4 style="color: #e62e6b;font-weight: bold;">{{ $product->price }} บาท</h4>
                <del class>฿{{ $product->actual_price }} </del>
                <div class='row'>
                    <div class='col-4'>
                        <input type="hidden" name="fee" value="{{  $product->fee  }}">
                        ค่าหิ้ว {{ $product->fee }} บาท/ชิ้น
                    </div>
                    <div class='col-6'>
                        <input type="hidden" name="shippping" value="{{  $product->shipping_price  }}">
                        ค่าจัดส่ง {{ $product->shipping_price }} บาท
                    </div>
                </div>
                <div class="row">
                    <div class="col-10"><button type="submit" class="btn btn-outline-danger"><i class="fas fa-cart-plus"></i> หยิบใส่ตะกร้า</button></div>
                    <div class="col-2"><button type="button" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i></button></div>
                    
                </div>
            </form>
        </div>
    </div>

    <div class="tabset">
        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
        <label for="tab1">รายละเอียดสินค้า</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
        <label for="tab2">รายละเอียดอีเว้นต์</label>
      
        
        <div class="tab-panels">
          <section id="marzen" class="tab-panel">
            <p><strong>Overall Impression:</strong> 
                {{ $product->name }}
                <h4 style="color: #e62e6b;font-weight: bold;">{{ $product->price }} บาท</h4>
                <del class>฿{{ $product->actual_price }} </del>
                <p style='color:333;'style="line-height : 0; padding:0%;margin:0%;">{{ $product->productdetail }}</p>
                
                 {{-- <p><strong>History:</strong> As the name suggests, brewed as a stronger “March beer” in March and lagered in cold caves over the summer. Modern versions trace back to the lager developed by Spaten in 1841, contemporaneous to the development of Vienna lager. However, the Märzen name is much older than 1841; the early ones were dark brown, and in Austria the name implied a strength band (14 °P) rather than a style. The German amber lager version (in the Viennese style of the time) was first served at Oktoberfest in 1872, a tradition that lasted until 1990 when the golden Festbier was adopted as the standard festival beer.</p> --}}
        </section>
          <section id="rauchbier" class="tab-panel">
            <p><strong>Overall Impression:</strong>  An elegant, malty German amber lager with a balanced, complementary beechwood smoke character. Toasty-rich malt in aroma and flavor, restrained bitterness, low to high smoke flavor, clean fermentation profile, and an attenuated finish are characteristic.</p>
            <p><strong>History:</strong> A historical specialty of the city of Bamberg, in the Franconian region of Bavaria in Germany. Beechwood-smoked malt is used to make a Märzen-style amber lager. The smoke character of the malt varies by maltster; some breweries produce their own smoked malt (rauchmalz).</p>
          </section>

        </div>
        
      </div>
      {{-- tabset --}}
      
      {{-- <p><small>Source: <cite><a href="https://www.bjcp.org/stylecenter.php">BJCP Style Guidelines</a></cite></small></p> --}}








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