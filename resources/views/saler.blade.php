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
.seller-mini{
    border:1px solid #eee;
    padding:5px; 
    cursor: pointer;
    text-align:center;
    margin: 5px;
}
.seller-mini:hover{
    background-color: #df3423;
    transition: opacity .5s ease-out;
    -moz-transition: opacity .5s ease-out;
    -webkit-transition: opacity .5s ease-out;
    -o-transition: opacity .5s ease-out;
}
.seller{
    width:220px;
    height: :180px; 
    color:black;
    margin-left:5px; 
    border:1px solid #eee;
    padding:5px; 
    text-align:center;
    opacity: 1;
    float:left;
    
}
.seller:hover{
    color: black;
    background-color: #df3423;
    opacity: .8;
    transition: opacity .5s ease-out;
    -moz-transition: opacity .5s ease-out;
    -webkit-transition: opacity .5s ease-out;
    -o-transition: opacity .5s ease-out;
}

input[type='radio'] {
    display: none;
}
label {
    display: block;
    width: 180px;
    padding: 15px;
    color: #4F5966;
    background: #FFF;
    cursor: pointer;
}
.modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    width: 105%;
}
.modal-content {
    width: 150%;
}
</style>
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
       เลือกนักหิ้ว
    </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="row col-md-12 d-none d-sm-none d-md-block d-lg-block">
                @foreach ($group->sellers as $seller)
                    @php
                    $eventShopId = $group->first()->attributes->event_shop_id;
                    // dd($eventShopId);
                    @endphp
                
                    <div id="row-seller-{{ $eventShopId.'-'.$seller->id }} col-md-3 " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
                            <div class="col">
                                <label class="seller" id="seller-{{ $seller->id }}"> 
                                    <div class="col-md-12 my-4">
                                        <input type="radio" name="rating" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                                        <img class="d-block card rounded img-fluid" src="{{ asset('hiwpro/images/bobby1.png')}}"> 
                                        {{ $seller->name }}
                                        <p>คะแนนนักหิ้ว</p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                
                                </label>
                            </div>
                    </div>
                    
                @endforeach

    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">ตกลง</button>
              
            </div>
          </div>
        </div>
      </div>



    

    <div class="row  d-md-none d-lg-none d-xl-none">
        @foreach ($group->sellers as $seller)
        @php
        $eventShopId = $group->first()->attributes->event_shop_id;
        // dd($eventShopId);
        @endphp
        <div class="col-12" id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
            <label class="seller-mini" id="seller-{{ $seller->id }}">
            <input type="radio" name="rating" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
            <img class="d-block card rounded img-fluid" src="{{ asset('hiwpro/images/bobby1.png')}}"> 
            {{ $seller->name }}
            <p>คะแนนนักหิ้ว</p>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        @endforeach
    </div>

<script>
    $(document).ready(function() {
        <?php foreach ($group->sellers as $seller) { ?>
        $("label.seller").on("click",function() {
                if($(this).find('#seller_selected-{{ $seller->id }}').is(':checked')) { 
                    $('#seller-{{ $seller->id }}').css('background-color','#df3423');
                    $('#seller-{{ $seller->id }}').css('opacity','1');
                }else {
                    $('#seller-{{ $seller->id }}').css('background-color','#FFF');
                }
            });
        <?php } ?>
    });
</script>