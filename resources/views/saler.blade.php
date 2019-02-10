<style>
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    /* margin-right: -15px; */
    /* margin-left: -15px; */
}
/* .d-block {
    display: block!important;
    margin: auto;
} */
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
@media screen and (max-width: 578px) {
  
  .show-sm {
        display: inline;
    }
  
}
.show-sm {
        display: none;
    }
.plum{
    background-color: plum;
}
.rebeccapurple{
    background-color: rebeccapurple;
}
</style>


                <div class="owl-carousel owl-theme justify-content-around plum row">
                    
                        @foreach ($group->sellers as $seller)
                        {{-- {{dd($seller)}} --}}
                         {{-- {{dd($seller->profile)}} --}}
                            @php
                            $eventShopId = $group->first()->attributes->event_shop_id;
                            // dd($eventShopId);
                            @endphp
                            <div class=" rebeccapurple" id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
                                    <div class="col">
                                        <label class="seller" id="seller-{{ $seller->id }}"> 
                                            <div class="item">
                                                
                                                {{-- @foreach ($seller->profile as $item)
                                                   
                                                @endforeach --}}
                                                
                                                <input type="radio" name="rating" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                                                <img class="mx-auto card rounded img-fluid" src="{{ asset('hiwpro/images/people.png')}}"> 
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


            <div class="col-lg-12 justify-content-around row">
                @foreach ($group->sellers as $seller)
                {{-- {{dd($seller)}} --}}
                 {{-- {{dd($seller->profile)}} --}}
                    @php
                    $eventShopId = $group->first()->attributes->event_shop_id;
                    // dd($eventShopId);
                    @endphp
                    <div class="" id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
                            <div class="col">
                                <label class="seller  " id="seller-{{ $seller->id }}"> 
                                    <div class="col-md-12 my-4">
                                        
                                        {{-- @foreach ($seller->profile as $item)
                                           
                                        @endforeach --}}
                                        
                                        <input type="radio" name="rating" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                                        <img class="mx-auto card rounded img-fluid" src="{{ asset('hiwpro/images/people.png')}}"> 
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

            {{-- <div class="col-12  justify-content-around">
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
            </div> --}}

             <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    
             <!-- Include all compiled plugins (below), or include individual files as needed -->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
            
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

    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
})
</script>