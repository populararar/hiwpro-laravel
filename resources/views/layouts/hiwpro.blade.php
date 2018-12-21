
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('hiwpro/bootstrap-4.1/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/fontawesome5.1/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('hiwpro/OwlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/OwlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/login.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('hiwpro/css/frontend/navbar-header.css') }}">



    <title>HIWPRO</title>

    <style>
        body{
        font-family: 'Kanit';
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
</style>

</head>

<body>
    <div style="width:100%; height:5px; background:#df3433;">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0 15%;">

        <a class="navbar-brand" href="index.php"><img class="img-fluid" style="box-sizing: border-box; margin: 0 10%;"
                src="{{ asset('hiwpro/images/logo.png') }}" alt="">HIWPRO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding:0 0 0 2%;">
            <ul class="navbar-nav mr-auto my-2 my-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/Christmas/view/frontend/index.php?pageid=1">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Christmas/view/frontend/index.php?pageid=2">โปรโมชั่น</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Christmas/view/frontend/index.php?pageid=3">นักหิ้วมือโปร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Christmas/view/frontend/index.php?pageid=4">หิ้วกับเรา</a>
                </li>

            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="/Christmas/view/frontend/index.php?pageid=7"> <i class="fas fa-shopping-cart"></i></a>
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
                        <a class="dropdown-item" href="/Christmas/view/frontend/customer_info.php">ข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="History.php">ประวัติการสั่งซื้อ</a>
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
                                    <p class="text-black">เป็นส่วนหนึ่งกับเรา <a href="reg-customer.php"><b>สมัครสมาชิก</b></a>
                                        <p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" style="margin-left:20px;">
                    <a href="{{ route('login.index') }}"  >สมัครสมาชิก</a>
                </li>
                <!-- end login -->


                @endif

            </ul>
        </div>
    </nav>


    @yield('content')



    <div class="weapper" style="background-color: #F9F9F9; padding:5%; text-decoration: none;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->

                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->

                        <ul>
                            <li><a href="index.php"><i class="fa fa-angle-double-right"></i> หน้าหลัก</a></li>
                            <li><a href="Listproduct.php"><i class="fa fa-angle-double-right"></i> สินค้า</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> เกี่ยวกับเรา</a></li>
                            <li><a href="Bolg.php"><i class="fa fa-angle-double-right"></i> บทความ</a></li>
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
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> เริ่มต้นขายของที่นี่</a></li>
                            <li><a href="Resister.php"><i class="fa fa-angle-double-right"></i> สมัครสมาชิก</a></li>
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
                            <p>ต. ปากเกร็ด อ. ปากเกร็ด นนทบุรี 11120 </p>
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

    <script type="text/javascript" src="{{ asset('hiwpro/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('hiwpro/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('hiwpro/bootstrap-4.1/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('hiwpro/OwlCarousel/dist/owl.carousel.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('hiwpro/OwlCarousel/src/js/owl.carousel.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</html>