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
.img-size{
    width: 125px;
    height: 125px;
    object-fit: contain;
}
.img-size-in{
    height: 100%;
    max-width: 100%;
    display: block;
    margin: auto;
    /* overflow: hidden; */
}
.seller-card img{
    width: 150px;;
}
.seller-card label{
    height: 250px;
}
</style>

             <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    
             <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
        @php
        $eventShopId = $group->first()->attributes->event_shop_id;
        
        @endphp

        @if(!empty($eventShopId))
            @foreach($group->sellers as $seller)
                @if (empty($seller))
                    <div class="alert alert-warning" role="alert">ไม่มีแม่ค้า</div>
                @endif
            @endforeach
        @endif  
        {{-- {{ dd($group->sellers) }} --}}

        @php
            $sellerPro = $group->sellers->filter(function($item){
                return $item->tag == "pro";
            });

            $sellerNormal = $group->sellers->filter(function($item){
                return $item->tag == "normal";
            });

            $sellerNewbie = $group->sellers->filter(function($item){
                return $item->tag == "newbie";
            });
        @endphp
        {{-- {{ dd($sellerPro , $sellerNormal , $sellerNewbie)  }} --}}



    <div class="row col-12" style="margin-left:20px;">
        <div class="col-12">
            <h1>นักหิ้วแนะนำ</h1>
        </div>
            {{-- <h1>เลือกนักหิ้ว</h1>  --}}
      
       
    </div>
    <div class="line-g">
        <div class="line-r">
        </div>
    </div>
    @foreach ($sellerPro as $seller)  
         @php
         $eventShopId = $group->first()->attributes->event_shop_id;
         @endphp
        
         <div class="col-12 mx-auto seller-card " id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
            <label class="seller " id="seller-{{ $seller->id }}"> 
                     <input type="radio" name="seller[][]" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                    @if(empty($seller->profile))
                    <img class="mx-auto card rounded img-fluid" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
                    @else
                    <img class="mx-auto card rounded img-fluid " src="{{ asset('storage') }}/{{ $seller->profile->img }}"> 
                    @endif
                    {{ $seller->name }}
                    <p>คะแนนนักหิ้ว</p>
                    <p class="card-text" style="color: #DFB737" > 
                    @if ($seller->avg == 0)
                    ยังไม่มีคะแนน
                    @elseif($seller->avg > 0 && $seller->avg < 0.5)
                    <i class="fas fa-star-half-alt"></i>
                    @elseif($seller->avg >= 0.5 && $seller->avg <= 1)
                    <i class="fas fa-star"></i>
                    @elseif($seller->avg > 1 && $seller->avg <= 1.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    @elseif($seller->avg > 1.5 && $seller->avg <= 2)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif($seller->avg > 2 && $seller->avg <= 2.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    @elseif($seller->avg > 2.5 && $seller->avg <= 3)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif($seller->avg >= 3 && $seller->avg <= 3.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    @elseif($seller->avg >= 3.5 && $seller->avg <= 4)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif($seller->avg >= 4 && $seller->avg <= 4.5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    @else
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @endif 
                    </p>  
                    (นักหิ้วมือโปร)
                     </label>
        </div>
    @endforeach

    @foreach ($sellerNewbie as $key => $seller)  
     @php
     $eventShopId = $group->first()->attributes->event_shop_id;
     @endphp
    
    <div class="col-12 mx-auto seller-card " id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
        <label class="seller " id="seller-{{ $seller->id }}"> 
            <input type="radio" name="seller[][]" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                @if(empty($seller->profile))
                <img class="mx-auto card rounded img-fluid" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
                @else
                <img class="mx-auto card rounded img-fluid " src="{{ asset('storage') }}/{{ $seller->profile->img }}"> 
                @endif
                {{ $seller->name }}
                <p>คะแนนนักหิ้ว</p>
                <p class="card-text" style="color: #DFB737" > 
                @if ($seller->avg == 0)
                ยังไม่มีคะแนน
                @elseif($seller->avg > 0 && $seller->avg < 0.5)
                <i class="fas fa-star-half-alt"></i>
                @elseif($seller->avg >= 0.5 && $seller->avg <= 1)
                <i class="fas fa-star"></i>
                @elseif($seller->avg > 1 && $seller->avg <= 1.5)
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                @elseif($seller->avg > 1.5 && $seller->avg <= 2)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                @elseif($seller->avg > 2 && $seller->avg <= 2.5)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                @elseif($seller->avg > 2.5 && $seller->avg <= 3)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                @elseif($seller->avg >= 3 && $seller->avg <= 3.5)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                @elseif($seller->avg >= 3.5 && $seller->avg <= 4)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                @elseif($seller->avg >= 4 && $seller->avg <= 4.5)
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                @else
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                @endif 
                </p> 
                (นักหิ้วหน้าใหม่)
        </label>
    </div>
    @endforeach

    <div class="col-sm-12" style="float:left;">
        <p>
        <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseExample-{{$counter}}" role="button" aria-expanded="false" 
        aria-controls="collapseExample">
            เลือกดูนักหิ้วทั้งหมด
        </a>
        </p>
    </div>
   
    <div class="collapse" id="collapseExample-{{$counter}}">
       
            @foreach ($sellerNormal as $seller)  
            @php
            $eventShopId = $group->first()->attributes->event_shop_id;
            @endphp
           
           <div class="col-12 mx-auto seller-card " id="row-seller-{{ $eventShopId.'-'.$seller->id }} " onclick="addSeller({{ $eventShopId }}, {{ $seller->id }})">
               <label class="seller " id="seller-{{ $seller->id }}"> 
                        <input type="radio" name="seller[][]" id="seller_selected-{{ $seller->id }}" value="{{ $seller->id }}" />
                       @if(empty($seller->profile))
                       <img class="mx-auto card rounded img-fluid" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
                       @else
                       <img class="mx-auto card rounded img-fluid " src="{{ asset('storage') }}/{{ $seller->profile->img }}"> 
                       @endif
                       {{ $seller->name }}
                       <p>คะแนนนักหิ้ว</p>
                       <p class="card-text" style="color: #DFB737" > 
                       @if ($seller->avg == 0)
                       ยังไม่มีคะแนน
                       @elseif($seller->avg > 0 && $seller->avg < 0.5)
                       <i class="fas fa-star-half-alt"></i>
                       @elseif($seller->avg >= 0.5 && $seller->avg <= 1)
                       <i class="fas fa-star"></i>
                       @elseif($seller->avg > 1 && $seller->avg <= 1.5)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                       @elseif($seller->avg > 1.5 && $seller->avg <= 2)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       @elseif($seller->avg > 2 && $seller->avg <= 2.5)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                       @elseif($seller->avg > 2.5 && $seller->avg <= 3)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       @elseif($seller->avg >= 3 && $seller->avg <= 3.5)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                       @elseif($seller->avg >= 3.5 && $seller->avg <= 4)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       @elseif($seller->avg >= 4 && $seller->avg <= 4.5)
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star-half-alt"></i>
                       @else
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       <i class="fas fa-star"></i>
                       @endif 
                       </p> 
                   </label>
           </div>
           @endforeach
       
    </div>
    @php
    
    @endphp


  
     
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
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>