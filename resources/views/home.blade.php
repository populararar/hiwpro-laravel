@extends('layouts.hiwpro')

@section('content')
<div class="container">
        <style>
                .carousel-wrap {
                  margin: 2% auto;
                  padding: 0 5%;
                  width: 100%;
                  position: relative;
                }
                
                /* fix blank or flashing items on carousel */
                .owl-carousel .item {
                  position: relative;
                  z-index: 100; 
                  -webkit-backface-visibility: hidden; 
                }
                
                /* end fix */
                .owl-nav > div {
                  margin-top: -26px;
                  position: absolute;
                  top: 50%;
                  color: #cdcbcd;
                }
                
                .owl-nav i {
                  font-size: 52px;
                }
                
                .owl-nav .owl-prev {
                  left: -30px;
                }
                
                .owl-nav .owl-next {
                  right: -30px;
                }
                .how{
                    border-radius: 50% ; 
                    background-color: #df3433; 
                    width: 100%; 
                    height: 18%;
                    padding:2%; 
                    text-align: center;
                }
                </style>
                <div class="container" style="padding: 0 5%;">
                
                    <div id="carouselExampleControls" class="carousel slide" style="border-bottom: 5px solid #df3433" data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- <div class="carousel-item active">
                            <img class="d-block w-100" src="/Christmas/public/images/branner1.png"alt="First slide">
                        </div> -->
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('hiwpro/images/branner1.png')}}">
                
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('hiwpro/images/branner2.jpg')}}">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- end Slide header -->
                
                    <div class="wrapper">
                        <div class="row"style="color: #df3433; padding: 2% 5%;">
                            <div class="col-6" >
                               <h1>ค้นหาสินค้า</h1>
                               สินค้าลดราคา แบรนด์ สถานที่
                            </div>
                            <div class="col-6">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button type="submit" style="text-align: center; border-radius: 30px;" class="btn btn-outline-danger align-self-center">ค้นหา</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- wrapper -->
                    <div class="weapper" style="background-color: #fff; padding:0 5%; ">
                
                        <h4 style="margin-top: 2%; color: #df3433;">งานวันนี้ <span class="badge badge-secondary">New</span></h4>
                        <h5>EVENT & PROMOTION </h5>
                
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <img class="img-fluid" style="border-radius: 2%;" src="{{ asset('hiwpro/images/p_02.png')}}">
                                <div class="text-center" style="text-align: center;">
                                    <ul style="padding: 0;">
                                        <li class="clock"><span id="days"></span>days</li>
                                        <li class="clock"><span id="hours"></span>Hours</li>
                                        <li class="clock"><span id="minutes"></span>Minutes</li>
                
                                    </ul>
                                </div>
                            </div>
                            <div class=".d-xs-none  col-sm-6 col-md-6" style="text-align: center;">
                                <h1 style="color: red;">KOREA FAIR<br>4-9/12</h1>
                                <p style="padding:5%;">อันยองงง พาส่องงาน Korea Expo 2018 เครื่องสำอางสัญชาติเกาหลี  ไม่ว่าจะเป็น Laneige, It's Skin, Etude, Sulwhasoo หรือ innisfree ก็มีหมดเลยจ้า ไม่ต้องง้อร้านพรี
                                เพราะราคาดีเหมือนซื้อเกาหลีเลยค่าา เอ้า สาวๆตุนด่วน !!
                                     </p>
                
                                <button type="button" style="text-align: center; border-radius: 30px;" class="btn btn-outline-danger align-self-center">ดูเพิ่มเติม</button>
                
                            </div>
                        </div>
                
                    </div><!-- weapper 1-->
                
                
                
                    <div class="weapper" style="background-color: #F1D7CD; padding:3% 5%; ">
                        <h4 style="margin-top: 2%; color: #df3433;">สินค้าแนะนำ </h4>
                        <h5>PRODUCT & SEGGESTION </h5>
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                
                
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_05.pn')}}g"
                                               >
                                        </div>
                                        <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_06.pn')}}g"
                                               >
                                        </div>
                                        <div class="col-lg-4 d-none d-md-none d-lg-block">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_07.pn')}}g"
                                               >
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_08.pn')}}g"
                                               >
                                        </div>
                                        <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_09.pn')}}g"
                                               >
                                        </div>
                                        <div class="col-lg-4 d-none d-md-none d-lg-block">
                                            <img class="card-img-top" style="border-radius: 2%;" src="{{ asset('hiwpro/images/S_11.pn')}}g"
                                               >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                
                    </div><!-- weapper pink 4-->
                
                    <div class="weapper" style="background-color: #df3433; padding:3% 5%; ">
                
                        <h4 style="color: #fff;">ตารางโปรโมชั่น </h4>
                        <h5>EVENT & PROMOTION </h5>
                
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-xl-4" style="padding:0 2% 0 0;">
                                <img class="img-fluid" src="{{ asset('hiwpro/images/calender.png')}}">
                            </div>
                            <div class="col-sm-12 col-md-8 col-xl-8">
                                <div class="weapper" style="background-color: #fff; padding: 5%; border-radius: 2%; overflow-y: auto;
                                height: 450px;">
                                 {{-- {{  dd($events) }}
                                  --}}
                                    @if(!empty($events))
                                    @foreach ($events as $event)
                                    <div class="row" style="border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;">
                                            <div class=".d-md-none col-md-1 ">
                                                <div class="row">
                                                <h6 style="border-bottom: 2px solid #df3433;">{{ $event->start_date }}</h6>
                                                </div>
                    
                                                <div class="row">
                                                    <h6>{{ $event->last_date }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-4 ">
                                            <img style="border-radius: 10%" src="{{ asset('/storage/'.$event->imgPath) }}" class="img-fluid">
                                            </div>
                                            <div class="col-sm-8 col-md-7 ">
                                            <h3 style="font-size:1.5em; border-bottom: 1px dotted #cccccc;">{{ $event->eventName }}</h3>
                                                <i style="color: #df3433;" class="far fa-calendar"></i> 
                                                {{ $event->start_date }} - {{ $event->last_date }}
                    
                                                <p class="text-truncate" style="text-overflow: clip;">
                                                    {{ $event->detail }}
                                                </p>
                    
                                                <div class="line-p"></div>
                                            <a href="/eventdetail/{{ $event->event_id }}" style="color: #df3433;">ดูเพิ่มเติม</a>
                                            </div>
                                        </div>
                    
                                 @endforeach  
                                 @endif 
                                  
                                </div><!-- weapper white -->
                            </div>
                
                        </div>
                    </div> <!-- weapper red 3-->
                
                    <div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; ">
                        <h4 style="margin-top: 2%; color: #df3433;">นักหิ้วมือโปร</h4>
                        <h5>POPULAR THIS MONTH </h5>
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="{{ asset('hiwpro/images/jisoo.jpg')}}">
                                    <div class="card-body">
                                        <h5 class="card-title">JISOO</h5>
                                        หิ้วสำเร็จ 50 ครั้ง <br>
                                             
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 d-none d-sm-none d-md-block ">
                                <div class="card">
                
                                    <ul style="padding:5% 8% 0% 8%;" class="list-unstyled">
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/jisoo2.png')}}">
                                            <div class="media-body" style="border-bottom: 2px dotted #ccc;
                                                                margin-top: 0%;
                                                                margin-bottom: 2%;
                                                                padding-bottom: 2%;">
                                                <h5 class="mt-0 mb-1">JISOO</h5>
                                                หิ้วสำเร็จ 50 ครั้ง <br>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                            </div>
                                            <div class=" float-right" style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                                <h3 style="color: #df3433"> 1</h3>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/bobby1.png')}}">
                                            <div class="media-body" style="border-bottom: 2px dotted #ccc;
                                                                margin-top: 0%;
                                                                margin-bottom: 2%;
                                                                padding-bottom: 2%;">
                                                <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                
                                                หิ้วสำเร็จ 42 ครั้ง <br>
                
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class=" float-right" style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                                <h3 style="color: #df3433">2</h3>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" src="{{ asset('hiwpro/images/lisa.png')}}">
                                            <div class="media-body" style="
                                                                margin-top: 0%;
                                                                margin-bottom: 2%;
                                                                padding-bottom: 2%;">
                                                <h5 class="mt-0 mb-1">Lisa BP</h5>
                
                                                หิ้วสำเร็จ 36 ครั้ง <br>
                
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star"></i>
                                                <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class=" float-right" style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;">
                                                <h3 style="color: #df3433"> 3</h3>
                                            </div>
                                        </li>
                                       
                
                                    </ul>
                                </div>
                
                            </div>
                        </div>
                
                
                    </div><!-- weapper gruy 5-->
                
                     <div class="weapper" style="background-color: #F1D7CD; padding:3% 5%; ">
                        <h4 style="margin-top: 2%; color: #df3433;">นักหิ้วหน้าใหม่ </h4>
                        <h5>PRODUCT & SEGGESTION </h5>
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="carousel-wrap">
                            <div class="owl-carousel">
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-02.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-03.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-04.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-05.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-06.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-07.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-08.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-09.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-10.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-11.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-12.png') }}"></div>
                                <div class="item"><img src="{{ asset('hiwpro/images/thumbnail-13.png') }}"></div>
                            </div>
                       </div>
                                    
                
                    </div><!-- weapper pink 4-->
                
                    <div class="weapper howto" style="">
                    <div id="carouselExampleFade" style="box-sizing:border-box; hight:20%;" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                
                            <div class="carousel-item active">
                                <div class="p-3 mb-2 bg-danger text-white text-center"><h4>5 Step การสั่งซื้อ</h4></div>
                                <div class="carousel-wrap">
                                    <div class="owl-carousel" style="padding: 0% 3%; color: #fff;">
                                        <div class="item"><div class="col rounded-circle"><div class="how">1<h1><i class="fas fa-search"></i> </h1>ค้นหา</div></div></div>
                                        <div class="item"><div class="col rounded-circle"><div class="how">2<h1><i class="fas fa-shopping-cart"></i> </h1>เลือกสินค้า</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">3<h1><i class="fas fa-shipping-fast"></i> </h1>ชำระเงิน</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">4<h1><i class="fas fa-shipping-fast"></i> </h1>รอรับของ</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">5<h1><i class="fas fa-boxes"></i> </h1>ได้สินค้า</div></div></div> 
                                    </div>
                                </div>
                            </div>
                
                            <div class="carousel-item">
                                <div class="p-3 mb-2 bg-danger text-white text-center"><h4>5 Step นักหิ้วมือโปร</h4></div>
                                <div class="carousel-wrap">
                                    <div class="owl-carousel" style="padding: 0% 3%; color: #fff;">
                                        <div class="item"><div class="col rounded-circle"><div class="how">1<h1><i class="far fa-newspaper"></i> </h1>ตามโปร</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">2<h1><i class="far fa-calendar-plus"></i> </h1>กด JION</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">3<h1><i class="fas fa-shopping-cart"></i> </h1>ซื้อสินค้า</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">4<h1><i class="fas fa-box"></i> </h1>จัดส่ง</div></div></div> 
                                        <div class="item"><div class="col rounded-circle"><div class="how">5<h1><i class="fas fa-hand-holding-usd"></i> </h1>รับเงิน</div></div></div> 
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div><!-- How to -->
                
                
                    <div class="weapper" style="padding:0 5%;">
                        <h4 style="margin: 2% 0%; color: #df3433; border-bottom:dotted 2px #df3433;">เทคนิคการหิ้วขั้นเทพ</h4>
                        
                        <dl class="row">
                
                            <dt class="col-sm-3">
                                <div class=" d-inline p-2 ">1</div>รีวิวการันตี
                            </dt>
                            <dd class="col-sm-9">ต้องดูรีวิวการรับหิ้ว ว่า รับหิ้วมานานหรือยัง รีวิวจากลูกค้าเก่าการันตีได้ของชัวร์
                                ไม่โกง ถ้าไม่ได้สินค้าโอนเงินคืนแน่นอน </dd>
                
                
                            <dt class="col-sm-3">
                                <div class="d-inline p-2 ">2</div>เห็นโปรก่อน
                            </dt>
                            <dd class="col-sm-9">
                                <p>เคยรับหิ้วสินค้าตัวไหนอยู่ในกระแสหรือที่เป็นความต้องการของตลาดบ้าง</p>
                
                            </dd>
                
                            <dt class="col-sm-3">
                                <div class="d-inline p-2 ">3</div>มีงานป้อน
                            </dt>
                            <dd class="col-sm-9">ดูว่ามีจำนวนลูกค้าในแฟนเพจเฟซบุ๊ก ในลูกค้าในกลุ่มไลน์รับหิ้วของร้านมีเยอะแค่ไหน</dd>
                
                            <dt class="col-sm-3">
                                <div class="d-inline p-2 ">4</div>รับหิ้วราคาถูก ไม่ได้ดีเสมอไป
                            </dt>
                            <dd class="col-sm-9">เพราะพ่อค้าแม่ค้าบางคน ตั้งราคาค่าหิ้วถูกเข้าไว้ล่อตาล่อใจลูกค้า
                                แต่พอถึงเวลาโอนเงินไปให้ได้ของมาจริง แต่กลับไม่ส่งของให้เอาสินค้าไปใช้เอง
                                และหายเข้ากลีบเมฆไปตามตัวไม่เจอก็มี</dd>
                
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <img src="{{ asset('hiwpro/images/contect.png') }}" class="img-fluid">
                                </div>
                                <div class="col-sm-12 col-md-6" style="padding-top:10%;">
                                    <h4 style="color: #df3433; text-align: center;">ติดต่อโฆษณา</h4>
                                    <blockquote class="text-center">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                            ante.</p>
                                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                
                
                    </div><!-- How to -->
                </div>
                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
                   
                   
                    <script>
                           
                
                            $('.owl-carousel').owlCarousel({
                            loop: true,
                            margin: 10,
                            nav: true,
                            navText: [
                                "<i class='fa fa-caret-left'></i>",
                                "<i class='fa fa-caret-right'></i>"
                            ],
                            autoplay: true,
                            autoplayHoverPause: true,
                            responsive: {
                                0: {
                                items: 1
                                },
                                600: {
                                items: 3
                                },
                                1000: {
                                items: 5
                                }
                            }
                            })
                       
                    </script>
                
</div>

@endsection
