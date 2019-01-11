<div class="col-sm-12" style="padding:2% 5%; background-color:white;margin-top:2%;">
    <div class="row">
        @foreach ($group->sellers as $seller)
        @php
        $eventShopId = $group->first()->attributes->event_shop_id;
        // dd($eventShopId);
        @endphp
        <div id="row-seller-{{ $eventShopId.'-'.$seller->id }}" class="row">
            <div class="col-sm-12" onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
                <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
                    <div class="toast-header">
                        <img src="..." class="rounded mr-2" alt="...">
                        <strong class="mr-auto">{{ $seller->name}}</strong>
                        <small>นักหิ้วมือโปร</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        {{ $seller->id }} , เลขบัตรแม่ค้า
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>