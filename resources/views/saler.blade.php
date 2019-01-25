<style>
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    /* margin-right: -15px; */
    /* margin-left: -15px; */
}
.d-block {
    display: block!important;
    margin: auto;
}
.seller{
    width:220px;
    height: :150px; 
    margin-left:5px; 
    border:1px solid #eee;
    padding:5px; 
    text-align:center;
    opacity: .8;
    cursor: pointer;
}
.seller:hover{
    color: antiquewhite;
    background-color: #cf2132;
    opacity: 1;
    transition: opacity .5s ease-out;
    -moz-transition: opacity .5s ease-out;
    -webkit-transition: opacity .5s ease-out;
    -o-transition: opacity .5s ease-out;
}
</style>

<div class="col-sm-12" style="padding:2% 5%; background-color:white;margin-top:2%;">
    <div class="row">
        @foreach ($group->sellers as $seller)
            @php
            $eventShopId = $group->first()->attributes->event_shop_id;
            // dd($eventShopId);
            @endphp
       
            <div id="row-seller-{{ $eventShopId.'-'.$seller->id }} col-md-3 " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
                <div class="row">
                    <div class="col-3">
                        <div class="seller">
                            <div class="col-md-12 ">
                                <img class="d-block card rounded img-fluid" src="{{ asset('hiwpro/images/bobby1.png')}}">
                            </div>
                            <div class="col-md-12">
                                {{ $seller->id }} - {{ $seller->name}}
                                <p>คะแนนนักหิ้ว</p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

</div>