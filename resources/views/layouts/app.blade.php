<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HIW PRO</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">

    @yield('css')

     <!-- jQuery 3.1.1 -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
     <!-- AdminLTE App -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
     <script src="{{ asset('lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
</head>
<style>
body,h1,h2,h3,h4,h5{
    font-family: 'Kanit', sans-serif;
}
@font-face {
    font-family: 'Kanit', sans-serif;
    font-style: normal;
    font-weight: 400;
    src: local('PT Sans'), local('PTSans-Regular'), url(https://fonts.gstatic.com/s/ptsans/v10/jizaRExUiTo99u79D0KEwA.ttf) format('truetype');
}
h1 {
  text-align: center;
  font-size: 48px;
  text-transform: uppercase;
  letter-spacing: 3px;
  color: #222;
}
.menu {
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 60px;
  margin: auto;
  position: relative;
  background-color: #2c3e50;
  z-index: 7;
}
.menu li {
  float: left;
  width: 25%;
  height: 100%;
  margin: 0;
  padding: 0;
}
.menu a {
  display: flex;
  width: 100%;
  height: 100%;
  justify-content: center;
  align-items: center;
  color: #fff;
  text-decoration: none;
  position: relative;
  font-size: 18px;
  z-index: 9;
}
a.active {
  background-color: #e74c3c;
  pointer-events: none;
}
li.slider {
  width: 25%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  background-color: #e74c3c;
  z-index: 8;
  transition: left 0.4s, background-color 0.4s;
}
.menu li:nth-child(1):hover ~ .slider,
.menu li:nth-child(1):focus ~ .slider,
.menu li:nth-child(1):active ~ .slider {
  left: 0;
  background-color: #3498db;
}
.menu li:nth-child(2):hover ~ .slider,
.menu li:nth-child(2):focus ~ .slider,
.menu li:nth-child(2):active ~ .slider {
  left: 25%;
  background-color: #9b59b6;
}
.menu li:nth-child(3):hover ~ .slider,
.menu li:nth-child(3):focus ~ .slider,
.menu li:nth-child(3):active ~ .slider {
  left: 50%;
  background-color: #e67e22;
}
.menu li:nth-child(4):hover ~ .slider,
.menu li:nth-child(4):focus ~ .slider,
.menu li:nth-child(4):active ~ .slider {
  left: 75%;
  background-color: #16a085;
}


</style>

@foreach (Auth::user()->usersRoles as $item)
    
    @if($item->role_id==1)
        <body class="skin-black sidebar-mini">
    @endif
    @if($item->role_id==2)
        <body class="skin-red sidebar-mini">
    @endif
    
@endforeach

@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
                
            <!-- Logo -->
            <a href="#" class="logo">
                
                <b>HIW PRO</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="https://sv1.picz.in.th/images/2018/12/14/9YJeFP.png"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="https://sv1.picz.in.th/images/2019/01/19/9yGI3l.jpg"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2018 <a href="#">HIW PRO - Company</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    HIW PRO
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

   

    @yield('scripts')
</body>
</html>