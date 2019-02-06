
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('hiwpro/bootstrap-4.1/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/fontawesome5.1/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('hiwpro/OwlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/OwlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/login.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/navbar-header.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/home.css') }}">


    

    <title>HIWPRO</title>

    <style>
        body{
        font-family: 'Kanit', sans-serif;;
    }
    h1{
        font-weight: 700;
    }
    h2{
        font-weight: 500;
    }
    h3{
        font-weight: 300;
    }

	 li.clock {
    display: inline-block;
    font-size: 0.80em;
    list-style-type: none;
    padding: 0.8em;
    text-transform: uppercase;
  }
  
  li.clock span {
    display: block;
    font-size: 4EM;
    color: red;
  }
  .howto{
	background-image: url('/Christmas/public/images/bg-howto.png');
	padding-top: 5%; padding-bottom: 5%;
  }
  .navbar-top{
    position: relative;
    background: #fff !important;
    border-bottom: 1px solid #efefef;
    box-shadow: 0 0 4px 0 #eee;
    border-top: solid 5px #cf2132; 
    padding: 0 15%;
    }
    .navbar-light .navbar-nav .nav-link {
        color: rgb(0, 0, 0);
    }
</style>
   <script type="text/javascript" src="{{ asset('hiwpro/js/jquery-3.3.1.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('hiwpro/js/popper.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('hiwpro/bootstrap-4.1/js/bootstrap.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('hiwpro/OwlCarousel/dist/owl.carousel.min.js') }}"></script>

   <script type="text/javascript" src="{{ asset('hiwpro/OwlCarousel/src/js/owl.carousel.js') }}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
   <script src="{{ asset('lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

</head>

<body>
    <div class="sticky-top">
    <nav class="sticky-top navbar-top  navbar navbar-expand-lg navbar-light bg-light" >

        <a class="navbar-brand" href="index.php"><img class="img-fluid" style="box-sizing: border-box; margin: 0 10%;"
                src="{{ asset('hiwpro/images/logo.png') }}" alt="">HIWPRO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding:0 0 0 2%;">
            <ul class="navbar-nav mr-auto my-2 my-lg-0">
                <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/eventinfo') }}">โปรโมชั่น</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">นักหิ้วมือโปร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">หิ้วกับเรา</a>
                </li>

            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link active" href="{{ route('cart.detail') }}"> <i class="fas fa-shopping-cart"></i>
                     {{ \Cart::getContent()->count() }}</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="margin-right:0;">
                  
                </li>

                @if (!Auth::guest())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {!! Auth::user()->name !!}
                        <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @php
                            $id = Auth::user()->id;
                        @endphp
                       {{-- {{ dd($User->id)}} --}}
                       
                        <a class="dropdown-item" href="{{ route('profiles.index') }}">ข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="{{route('orders.store') }}">ประวัติการสั่งซื้อ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout.index') }}">ออกจากระบบ</a>
                    </div>
                </li>

                @else

                <li class="dropdown">
                    <a href="{{ route('login.index') }}"  >เข้าสู่ระบบ</a>
                    <ul id="login-dp" class="dropdown-menu div-login">
                        <li style="margin-right:0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-black" style="text-align: center;font-size: 25px;font-weight: bold;">เข้าสู่ระบบสมาชิก</p>
                                    <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav"
                                        action="/Christmas/function/frontend/login.php">
                                        <div class="form-group">
                                            <input type="text" name="IDUsernameMember" class="form-control" id="exampleInputEmail2"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">รหัสผ่าน</label>
                                            <input type="password" name="PassUsernameMember" class="form-control" id="exampleInputPassword2"
                                                placeholder="Password" required>
                                            <div class="help-block text-right"><a class="text-black" href="">ลืมรหัสผ่าน
                                                    ?</a></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submitLoginWeb" class="btn btn-primary btn-block"
                                                value="Sign in">
                                        </div>
                                        <!-- <div class="checkbox">
                                          <label>
                                             <input type="checkbox"> <span class="text-black">จดจำเข้าสู่ระบบ</span>
                                             </label>
                                        </div> -->
                                    </form>
                                </div>
                                <div style="width:300px;padding:5%;" class="bottom text-center">
                                    <p class="text-black">เป็นส่วนหนึ่งกับเรา <a href="{{ route('register') }}"><b>สมัครสมาชิก</b></a>
                                        <p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" style="margin-left:20px;">
                    <a href="{{ route('register') }}"  >สมัครสมาชิก</a>
                </li>
                <!-- end login -->


                @endif

            </ul>
        </div>
    </nav>
    </div>

    @yield('content')


</div>

    <div class="wrapper" style="background-color: #F9F9F9; padding:5%; text-decoration: none;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->

                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->

                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-angle-double-right"></i> หน้าหลัก</a></li>
                            <li><a href="{{ url('/eventinfo') }}"><i class="fa fa-angle-double-right"></i> โปรโมชั่น</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> เกี่ยวกับเรา</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> บทความ</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> ติดต่อเรา</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->

                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->

                        <!--    <h1 class="title-widget">Useful links</h1> -->
                        <ul>
                            <li><a href="{{ route('register') }}"><i class="fa fa-angle-double-right"></i> เริ่มต้นขายของที่นี่</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-angle-double-right"></i> สมัครสมาชิก</a></li>
                            <!-- <li><a  href="#"><i class="fa fa-angle-double-right"></i>  เข้าสู่ระบบ</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_recent_news">
                        <!-- widgets list -->
                        <h3>ข้อมูลติดต่อ </h3>
                        <div>
                            <h5> City Campus เมืองทองธานี.</h5>
                            <p>ต.บางพูด อ. ปากเกร็ด นนทบุรี 11120 </p>
                            <p><b>Email :</b> <a href="#"> hiwpro@info.com</a></p>

                        </div>
                        <div>
                            <ul>
                                <a href="https://www.facebook.com/bootsnipp"><i class="fab fa-facebook-square fa-3x social-tw social-fb"></i></a>
                                <a href="https://twitter.com/bootsnipp"><i class="fab fa-twitter-square  fa-3x social-tw"></i></a>
                                <a href="https://plus.google.com/+Bootsnipp-page"><i class="fab fa-google-plus-square fa-3x social-gp"></i></i></a>
                                <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em"></i></a>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    </div>
    <!--end footer -->

    <!-- footer emd -->

    <div class="footer-bottom">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 ">

                    <div class="copyright text-center">

                        &copy; HIW PRO 2018. All Rights Reserved

                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                    <div class="design">

                        <!--    <a href="#">Franchisee </a> |  <a target="_blank" href="http://www.webenlance.com">Web Design & Development by Webenlance</a> -->

                    </div>

                </div>

            </div>

        </div>

    </div>

 
    @yield('scripts')
</html>