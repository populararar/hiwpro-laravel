@extends('layouts.hiwpro')

@section('content')

ชำระเงิน
<form class="form-inline">
    
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">วันหมดอายุ(ดด/ปป)</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option selected>Jan(01)</option>
            <option value="1">Feb(02)</option>
            <option value="2">Mar(03)</option>
            <option value="3">Apr(04)</option>
            <option value="4">May(05)</option>
            <option value="5">Jun(06)</option>
            <option value="6">Jul(07)</option>
            <option value="7">Aug(08)</option>
            <option value="8">Sep(09)</option>
            <option value="9">Oct(10)</option>
            <option value="10">Nov(11)</option>
            <option value="12">Dec(12)</option>
        </select>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option selected>2019</option>
                <option value="1">2020</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        <div class="form-group">
                <label for="inputPassword6">เลข CVV</label>
                <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                <small id="passwordHelpInline" class="text-muted">
                
                </small>
            </div>
</form>
    <form action="{{route('orders.store') }}" method="POST">
            @csrf
        <button class="btn btn-success btn-block" type="submit">Submit</button>
        </form>

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
        var form = $('#cart-form')
        function addSeller(eventShopId, sellerId) {
            var data = eventShopId + '|' + sellerId
            var filter = [];
            $("input[name*='seller']").filter(function (index) {
                var a = $(this).val()
                if (a.split("|")[0] == eventShopId) {
                    console.log($(this).val().split("|")[0], eventShopId)
    
                    $(this).remove();
                    return true
                }
                return false
            });
    
            if (filter.length < 1) form.append('<input type="text" name="seller[]" value="' + data + '">');
        }
    
    
    </script>
    @endsection