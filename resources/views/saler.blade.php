<div class="col-sm-12" style="padding:2% 5%; background-color:white;margin-top:2%;">
    <div class="row">
        @foreach ($group->sellers as $seller)
        @php
        $eventShopId = $group->first()->attributes->event_shop_id;
        // dd($eventShopId);
        @endphp
       
        <div id="row-seller-{{ $eventShopId.'-'.$seller->id }}" onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
        <div class="row">
            <div class="col-3">
                <div class="row"  style="width:220px;heigh:150px; margin-left:5px; border:1px solid #eee;padding:5px;">
                    <div class="col-md-4 ">
                        <img class="d-block rounded img-fluid" src="{{ asset('hiwpro/images/bobby1.png')}}">
                    </div>
                    <div class="col-md-8">
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