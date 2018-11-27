@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="container" style="padding: 0 5%;">

<div id="carouselExampleControls" class="carousel slide" style="border-bottom: 5px solid #df3433" data-ride="carousel">
    <div class="carousel-inner">
        <!-- <div class="carousel-item active">
            <img class="d-block w-100" src="/Christmas/public/images/branner1.png"alt="First slide">
        </div> -->
        <div class="carousel-item active">
            <img class="d-block w-100" src="/Christmas/public/images/branner1.png" alt="Second slide">
            
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/Christmas/public/images/branner1.png" alt="Third slide">
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
<div class="weapper" style="background-color: #fff; padding:0 5%; ">
    
    <h4 style="margin-top: 2%; color: #df3433;">งานวันนี้ <span class="badge badge-secondary">New</span></h4>
    <h5>EVENT & PROMOTION </h5>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <img class="img-fluid" style="border-radius: 2%;" src="/Christmas/public/images/p_01.png" >
            <div class="text-center" style="text-align: center;">
                <ul style="padding: 0;" >
                    <li class="clock"><span id="days"></span>days</li>
                    <li class="clock"><span id="hours"></span>Hours</li>
                    <li class="clock"><span id="minutes"></span>Minutes</li>
                    
                </ul>
            </div>
        </div>
        <div class=".d-xs-none  col-sm-6 col-md-6"  style="text-align: center;">
            <h1 style="color: red;">KOREA FAIR<br>8-23/10</h1>
            <p style="padding:5%;">แชมปิยอง ดีพาร์ทเมนต์บาลานซ์วอลนัท ครัวซองต์แหม็บ สเตชั่นปิยมิตร แซ็กโซโฟนเห่ยคลาสสิกแพนดา </p>
        
            <button type="button"  style="text-align: center; border-radius: 30px;" class="btn btn-outline-danger align-self-center">ดูเพิ่มเติม</button>
            
        </div>
      </div>

    </div><!-- weapper 1-->

    <div class="weapper" style="background-color: #df3433; padding:3% 5%; ">
       
        <h4 style="color: #fff;">ตารางโปรโมชั่น <span class="badge badge-secondary">New</span></h4>
        <h5>EVENT & PROMOTION </h5>

        <div class="row">
            <div class="col-sm-12 col-md-4 col-xl-4"style="padding:0 2% 0 0;">
                <img class="img-fluid" src="/Christmas/public/images/calender.png" alt="">
            </div>
            <div class="col-sm-12 col-md-8 col-xl-8">
                    <div class="weapper" style="background-color: #fff; padding: 5%; border-radius: 2%;">

                            <div class="row" style="border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;">
                                    <div class=".d-md-none col-md-1 ">
                                            <div class="row">
                                                    <h6 style="border-bottom: 2px solid #df3433;" >NOV</h6>	
                                                </div>
                                                
                                                <div class="row">
                                                    <h6>3-6</h6>	
                                                </div>
                                    </div>
                                    <div class="col-sm-3 col-md-4 ">
                                            <img style="border-radius: 10%" src="/Christmas/public/images/pro_01.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-sm-8 col-md-7 ">
                                            <h3 style="font-size:1.5em; border-bottom: 1px dotted #cccccc;">Coming Events</h3>	
                                            <i style="color: #df3433;" class="far fa-calendar"></i> 2018 เมืองทองธานี
                                            7.00 น - 18.00 น 
                        
                                        <p class="text-truncate" style="text-overflow: clip;" >
                                            แชมปิยอง ดีพาร์ทเมนต์บาลานซ์วอลนัท ครัวซองต์แหม็บ สเตชั่นปิยมิตร 
                                            แซ็กโซโฟนเห่ยคลาสสิกแพนดา จิตพิสัยซิตี้แบดแดนเซอร์ออกแบบ สี่แยกด็อกเตอร์
                                        </p>
                        
                                        <div class="line-p"></div>
                                        
                                        <a href="#" style="color: #df3433;">ดูเพิ่มเติม</a>
                                    </div>
                            </div>

                            <div class="row" style="border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;">
                                <div class=" col-md-1 ">
                                        <div class="row" >
                                                <h6 style="border-bottom: 2px solid #df3433;">NOV</h6>	
                                            </div>
                                            
                                            <div class="row">
                                                <h6>23-30</h6>	
                                            </div>
                                </div>
                                <div class="col-sm-3 col-md-4 ">
                                        <img style="border-radius: 10%" src="/Christmas/public/images/pro_02.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-sm-8 col-md-7 ">
                                        <h3 style="font-size:1.5em; border-bottom: 1px dotted #cccccc;">Coming Events</h3>	
                                        <i style="color: #df3433;" class="far fa-calendar"></i> 2018 เมืองทองธานี
                                        7.00 น - 18.00 น 
                    
                                    <p class="text-truncate" style="text-overflow: clip;" >
                                        แชมปิยอง ดีพาร์ทเมนต์บาลานซ์วอลนัท ครัวซองต์แหม็บ สเตชั่นปิยมิตร 
                                        แซ็กโซโฟนเห่ยคลาสสิกแพนดา จิตพิสัยซิตี้แบดแดนเซอร์ออกแบบ สี่แยกด็อกเตอร์
                                    </p>
                    
                                    <div class="line-p"></div>
                                    
                                    <a href="#" style="float:left; color: #df3433;">ดูเพิ่มเติม</a>
                                </div>
                        </div>

                        
                        <div class="row" style="border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;">
                            <div class=" col-md-1 ">
                                    <div class="row" >
                                            <h6 style="border-bottom: 2px solid #df3433; ">DEC</h6>	
                                        </div>
                                        
                                        <div class="row">
                                            <h6>27-30</h6>	
                                        </div>
                            </div>
                            <div class="col-sm-3 col-md-4 ">
                                    <img style="border-radius: 10%" src="/Christmas/public/images/pro_02.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-8 col-md-7 ">
                                    <h3 style="font-size:1.5em; border-bottom: 1px dotted #cccccc;">Coming Events</h3>	
                                    <i style=" color: #df3433;" class="far fa-calendar"></i> 2018 เมืองทองธานี
                                    7.00 น - 18.00 น 
                
                                <p class="text-truncate" style="text-overflow: clip;" >
                                    แชมปิยอง ดีพาร์ทเมนต์บาลานซ์วอลนัท ครัวซองต์แหม็บ สเตชั่นปิยมิตร 
                                    แซ็กโซโฟนเห่ยคลาสสิกแพนดา จิตพิสัยซิตี้แบดแดนเซอร์ออกแบบ สี่แยกด็อกเตอร์
                                </p>
                
                                <div class="line-p"></div>
                                
                                <a href="#" style="float:left; color: #df3433;">ดูเพิ่มเติม</a>
                            </div>
                    </div>

                    </div><!-- weapper white -->
            </div>
                
        </div>
    </div> <!-- weapper red 3-->


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
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_01.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_02.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 d-none d-md-none d-lg-block" >
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_03.png" alt="Card image cap">
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_01.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_02.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 d-none d-md-none d-lg-block" >
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_03.png" alt="Card image cap">
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_01.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 col-md-6  d-none d-sm-none d-md-block">
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_02.png" alt="Card image cap">
                        </div>
                        <div class="col-lg-4 d-none d-md-none d-lg-block" >
                            <img class="card-img-top" style="border-radius: 2%;" src="/Christmas/public/images/S_03.png" alt="Card image cap">
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
    <div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; ">
            <h4 style="margin-top: 2%; color: #df3433;">นักหิ้วมือโปร</h4>
            <h5>POPULAR THIS MONTH </h5>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 ">
                            <div class="card mb-3">
                                    <img class="card-img-top" src="/Christmas/public/images/bobby-ikon-elle.jpg" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">MARK KOFINITOUIN</h5>
                                      ABOUT SHOPPER : FAST TRUST <br>
                                      <p class="card-text"> รับหิ้วราคาสูงสุด 10,000 B</p>
                                      <br>
                                      <i style="color: #df3433" class="fas fa-star"></i>
                                      <i style="color: #df3433" class="fas fa-star"></i>
                                      <i style="color: #df3433" class="fas fa-star"></i>
                                      <i style="color: #df3433" class="fas fa-star"></i>
                                      <i style="color: #df3433" class="fas fa-star"></i>
                                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                  </div>
                    </div>
                    <div class="col-lg-8 col-md-8 d-none d-sm-none d-md-block ">
                    <div class="card">

                            <ul style="padding:5% 8% 0% 8%;" class="list-unstyled">
                                    <li class="media">
                                      <img class="mr-3 rounded-circle" src="/Christmas/public/images/bobby.png" alt="Generic placeholder image">
                                      <div class="media-body" 
                                      style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                        <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                                        รับหิ้วราคาสูงสุด 10,000 B <br>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                      </div>
                                      <div class=" float-right"  style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;"> 
                                        <h3 style="color: #df3433"> 1</h3> 
                                    </div>   
                                    </li>
                                    <li class="media">
                                      <img class="mr-3 rounded-circle" src="/Christmas/public/images/bobby1.png" alt="Generic placeholder image">
                                      <div class="media-body" 
                                      style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                        <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                                            
                                        รับหิ้วราคาสูงสุด 10,000 B <br>
                                        
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                      </div>
                                      <div class=" float-right"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;"> 
                                        <h3 style="color: #df3433"> 2</h3> 
                                      </div>
                                    </li>
                                    <li class="media">
                                      <img class="mr-3 rounded-circle" src="/Christmas/public/images/bobby2.png" alt="Generic placeholder image">
                                      <div class="media-body" 
                                      style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                        <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                                           
                                        รับหิ้วราคาสูงสุด 10,000 B <br>
                                        
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star"></i>
                                        <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                      </div>
                                      <div class=" float-right"  style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;"> 
                                        <h3 style="color: #df3433"> 3</h3> 
                                      </div>
                                    </li>
                                    <li class="media">
                                            <img class="mr-3 rounded-circle" src="/Christmas/public/images/bobby3.png" alt="Generic placeholder image">
                                            <div class="media-body"
                                            style="border-bottom: 2px dotted #ccc;
                                            margin-top: 0%;
                                            margin-bottom: 2%;
                                            padding-bottom: 2%;">
                                              <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                                                 
                                              รับหิ้วราคาสูงสุด 10,000 B <br>
                                              
                                              <i style="color: #df3433" class="fas fa-star"></i>
                                              <i style="color: #df3433" class="fas fa-star"></i>
                                              <i style="color: #df3433" class="fas fa-star"></i>
                                              <i style="color: #df3433" class="fas fa-star"></i>
                                              <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class=" float-right"  style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;"> 
                                              <h3 style="color: #df3433">4</h3> 
                                            </div>
                                          </li>
                                          <li class="media">
                                                <img class="mr-3 rounded-circle" src="/Christmas/public/images/bobby4.png" alt="Generic placeholder image">
                                                <div class="media-body" 
                                                style="border-bottom: 2px dotted #ccc;
                                                margin-top: 0%;
                                                margin-bottom: 2%;
                                                padding-bottom: 2%;">
                                                  <h5 class="mt-0 mb-1">BOBBYINDAEYO</h5>
                                                     
                                                  รับหิ้วราคาสูงสุด 10,000 B <br>
                                                  
                                                  <i style="color: #df3433" class="fas fa-star"></i>
                                                  <i style="color: #df3433" class="fas fa-star"></i>
                                                  <i style="color: #df3433" class="fas fa-star"></i>
                                                  <i style="color: #df3433" class="fas fa-star-half-alt"></i>
                                                  <i style="color: #df3433" class="far fa-star"></i>
                                                </div>
                                                <div class=" float-right"  style="border: 1px solid #cccccc; border-radius: 50%; background-color: #fff; width: 50px; height: 50px;padding: 2%; text-align: center;"> 
                                                  <h3 style="color: #df3433">5</h3> 
                                                </div>
                                              </li>
                                  </ul>
                    </div>
                           
                    </div>
                </div>


        </div><!-- weapper gruy 5-->

        <div class="weapper howto" style="">
               

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                           <div class="carousel-item active"> 
                               <div class="p-3 mb-2 bg-danger text-white text-center"  ><h4>5 Step การสั่งซื้อ</h4></div>
                                <div class="row" style="padding: 15๔ 3%; color: #df3433;">
                                        <div class="col-md" >
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding:2%; text-align: center;"> 
                                                         1
                                                        <h1><i class="fas fa-search"></i> </h1>
                                                        ค้นหา
                                                </div>
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        2
                                                        <h1 s><i class="fas fa-shopping-cart"></i> </h1>
                                                        เลือกสินค้า
                                               </div>
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        3
                                                        <h1><i class="fas fa-search"></i></h1>
                                                        ชำระเงิน
                                                </div>
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        4
                                                        <h1> <i class="fas fa-shipping-fast" ></i> </h1>
                                                        รอรับของ
                                                </div>
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        5
                                                        <h1><i class="fas fa-boxes"></i></i></h1>
                                                        ได้สินค้า
                                                </div>
                                               
                                        </div>
            
                                    </div>
                          </div> 
                          <div class="carousel-item">
                                <div class="p-3 mb-2 bg-danger text-white text-center" ><h4>5 Step นักหิ้วมือโปร</h4></div>
                                <div class="row" style="padding: 0 3%; color: #df3433;">
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        1
                                                        <h1> <i class="far fa-newspaper"></i> </h1>
                                                       
                                                        ตามโปร
                                                </div> 
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        2
                                                        <h1><i class="far fa-calendar-plus"></i></h1>
                                                        
                                                        กด JION
                                                </div>
                                        </div>

                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        3
                                                        <h1><i class="fas fa-shopping-cart"></i> </h1>
                                                        ซื้อสินค้า
                                                </div>
                                                
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        4
                                                        <h1><i class="fas fa-box"></i></i></h1>
                                                        จัดส่ง
                                                </div>
                                              
                                        </div>
                                        <i class="fas fa-angle-double-right"></i>
                                        <div class="col-md">
                                                <div class=" float-right rounded-circle"  style="border: 1px solid #cccccc; border-radius: 50% ; background-color: #fff; width: 100%; height: 100%;padding: 2%; text-align: center;"> 
                                                        5
                                                        <h1><i class="fas fa-hand-holding-usd"></i></h1>
                                                        รับเงิน
                                                </div>
                                               
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
                <h4 style="margin-top: 2%; color: #df3433;">เทคนิคการหิ้วขั้นเทพ</h4>
                <h5>SHOPPER</h5>
                        <dl class="row">
                          
                            <dt class="col-sm-3"><div class=" d-inline p-2 bg-danger text-white rounded-circle ">1</div>รีวิวการันตี</dt>
                            <dd class="col-sm-9">ต้องดูรีวิวการรับหิ้ว ว่า รับหิ้วมานานหรือยัง รีวิวจากลูกค้าเก่าการันตีได้ของชัวร์ ไม่โกง ถ้าไม่ได้สินค้าโอนเงินคืนแน่นอน </dd>
                        
                        
                            <dt class="col-sm-3"><div class="d-inline p-2 bg-danger text-white rounded-circle">2</div>เห็นโปรก่อน</dt>
                            <dd class="col-sm-9">
                            <p>เคยรับหิ้วสินค้าตัวไหนอยู่ในกระแสหรือที่เป็นความต้องการของตลาดบ้าง</p>
                            
                            </dd>
                        
                            <dt class="col-sm-3"><div class="d-inline p-2 bg-danger text-white rounded-circle">3</div>มีงานป้อน</dt>
                            <dd class="col-sm-9">ดูว่ามีจำนวนลูกค้าในแฟนเพจเฟซบุ๊ก ในลูกค้าในกลุ่มไลน์รับหิ้วของร้านมีเยอะแค่ไหน</dd>
                        
                            <dt class="col-sm-3"><div class="d-inline p-2 bg-danger text-white rounded-circle">4</div>รับหิ้วราคาถูก ไม่ได้ดีเสมอไป</dt>
                            <dd class="col-sm-9">เพราะพ่อค้าแม่ค้าบางคน ตั้งราคาค่าหิ้วถูกเข้าไว้ล่อตาล่อใจลูกค้า แต่พอถึงเวลาโอนเงินไปให้ได้ของมาจริง แต่กลับไม่ส่งของให้เอาสินค้าไปใช้เอง และหายเข้ากลีบเมฆไปตามตัวไม่เจอก็มี</dd>
             
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <img src="/Christmas/public/images/contect.png" class="img-fluid" alt="responsive" style="border-radius: 3%;">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                        <h4 style="color: #df3433; text-align: center;">ติดต่อโฆษณา</h4>
                                        <blockquote class="text-center">
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                        </blockquote>
                                </div>
                            </div>

                    
        </div><!-- How to -->

    </div>
</div>
@endsection
