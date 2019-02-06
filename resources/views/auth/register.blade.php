<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Overpass:300,400,600,800" >
    <link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <title>สมัครสมาชิก</title>
  </head>
  <style>
      /*
 CSS for the main interaction
*/
    .tabset > input[type="radio"] {
    position: absolute;
    left: -200vw;
    }

    .tabset .tab-panel {
    display: none;
    }

    .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
    .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
    .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
    .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
    .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
    .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
    display: block;
    }

    /*
    Styling
    */
    body {
    font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
    color: #333;
    font-weight: 300;
    text-align: center
    }
    .card{
        width: 100%;
        padding: 5% 5% 2% 5%;
        margin: auto;
    }
    .tabset > label {
    position: relative;
    display: inline-block;
    padding: 15px 15px 25px;
    border: 1px solid transparent;
    border-bottom: 0;
    cursor: pointer;
    font-weight: 600;
    }

    .tabset > label::after {
    content: "";
    position: absolute;
    left: 15px;
    bottom: 10px;
    width: 22px;
    height: 4px;
    background: #8d8d8d;
    }

    .tabset > label:hover,
    .tabset > input:focus + label {
    color: #06c;
    }

    .tabset > label:hover::after,
    .tabset > input:focus + label::after,
    .tabset > input:checked + label::after {
    background: #06c;
    }

    .tabset > input:checked + label {
    border-color: #ccc;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    }

    .tab-panel {
    padding: 30px 0;
    border-top: 1px solid #ccc;
    }

    /*
    Demo purposes only
    */
    *,
    *:before,
    *:after {
    box-sizing: border-box;
    }

    body {
    padding: 30px;
    }

    .tabset {
    max-width: 65em;
    }

    .tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
        background: #bd2130;
    }
    .tabset > label:hover::after, .tabset > input:focus + label::after, .tabset > input:checked + label::after {
        background: #bd2130;
    }
    .tabset > label:hover, .tabset > input:focus + label {
        color: black;
    }
/* ---------------------------------------- */
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
  body
  {
    font-family: 'Kanit', sans-serif; 
  }
        
  .font-gray
  {
    margin-top: 2%; color: gray;
  }

  .page-header {
    padding-bottom: 9px;
    margin: 40px 0 20px;
    border-bottom: 1px solid #eee;
  }
  .imagePreview {
    width: 100%;
    height: 350px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#000000;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}

  </style>
  <body style="padding:10px;">
    
    <div class="container">

    
    <div class="wrapper">
        <h1>HIW-PRO REGISTER</h1>
<div class="tabset">
        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" aria-controls="customer" checked>
        <label for="tab1">CUSTOMER</label>
        <!-- Tab 2 -->
        <input type="radio" name="tabset" id="tab2" aria-controls="seller">
        <label for="tab2">SELLER</label>
       
        
        <div class="tab-panels">

        <section id="customer" class="tab-panel">
            {{-- <h2>สมัครสมาชิก</h2> --}}
            <p><strong>CUSTOMER: </strong> Register a customer new membership</p>
           
            <div class="col-xs-12 card " >
                    
                    <form method="post" action="{{ url('/register') }}" enctype="multipart/form-data">
    
                        {!! csrf_field() !!}
                        <input type="hidden"name="role" value="3" >
                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
    
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4"><label for="exampleInputName2">เบอร์โทรศัพท์ :</label></div>
                        <div class="col-md-6">
                                <div class="form-group has-feedback{{ $errors->has('tel_add') ? ' has-error' : '' }}">
                                    <input type="text" name="tel_add" class="form-control" placeholder="เบอร์โทรศัพท์">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            
                                    @if ($errors->has('tel_add'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tel_add') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                        </div>

                        <div>
                            
                            <div class="col-sm-6 imgUp">
                                <div class="imagePreview  has-feedback{{ $errors->has('img_pro') ? ' has-error' : '' }}"></div>
                                    <label class="btn btn-danger">รูปประจำตัว
                                    <input name="img_pro" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    @if ($errors->has('img_pro'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img_pro') }}</strong>
                                        </span>
                                    @endif
                                </div><!-- col-2 -->
                                
                               
                                  
                        </div>
    
                        <div class="row">
                            <div class="col-xs-8 col-md-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4 col-md-4">
                                <button type="submit" class="btn btn-danger btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
    
                    <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
                </div>
                    <!-- /.form-box -->
        </section>


        <section id="seller" class="tab-panel">
             <p><strong> SELLER: </strong>Register a customer new membership</p>
                <div class="col-xs-12 card ">
                    
                        <form method="post" action="{{ url('/register') }}" enctype="multipart/form-data">
        
                            {!! csrf_field() !!}
                            <input type="hidden"name="role" value="2" >
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
        
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        
                            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 imgUp">
                                <div class="imagePreview  has-feedback{{ $errors->has('img_pro') ? ' has-error' : '' }}"></div>
                                    <label class="btn btn-danger">รูปประจำตัว
                                    <input name="img_pro" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    @if ($errors->has('img_pro'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img_pro') }}</strong>
                                        </span>
                                    @endif
                                </div><!-- col-2 -->

                            <h4>รายละเอียดส่วนตัว</h4>
                            <img src="https://sv1.picz.in.th/images/2019/01/19/9yeiX8.jpg" class="img-fluid" alt="">
                            <div class="row" style="text-align:right;margin:2% 0%;">
                                <div class="col-md-4"><label for="exampleInputName2">ชื่อบัญชี :</label></div>
                                <div class="col-md-6">
                                        <div class="form-group has-feedback{{ $errors->has('bank_account') ? ' has-error' : '' }}">
                                            <input type="text" name="bank_account" class="form-control" placeholder="เลขบัญชี">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                                            @if ($errors->has('bank_account'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('bank_account') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-md-4"><label for="exampleInputName2">เลขบัญชี :</label></div>
                                <div class="col-md-6">
                                        <div class="form-group has-feedback{{ $errors->has('bank_num') ? ' has-error' : '' }}">
                                            <input type="text" name="bank_num" class="form-control" placeholder="เลขบัญชี">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                                            @if ($errors->has('bank_num'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('bank_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                            </div>
    
                            <div class="row" style="text-align:right;margin:2% 0%;">
                                <div class="col-md-4"><label for="exampleInputName2">ชื่อธนาคาร :</label></div>
                                <div class="col-md-6">
                                        <select name="bank_name"  class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option value="ธนาคารกรุงเทพ" selected>ธนาคารกรุงเทพ</option>
                                                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                                <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                                <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                                                <option value="ธนาคารซิติแบงก์">ธนาคารซิติแบงก์</option>
                                                <option value="ธนาคารซีไอเอ็มบี ไทย">ธนาคารซีไอเอ็มบี ไทย</option>
                                                <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                                                <option value="ธนาคารนครหลวงไทย">ธนาคารนครหลวงไทย</option>
                                                <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                                <option value="ธนาคารไอซีบีซี (ไทย)">ธนาคารไอซีบีซี (ไทย)</option>
                                                <option value="ธนาคารอื่นๆ">ธนาคารอื่นๆ</option>
                                        </select> 
                                </div>
                            </div>
                            <div class="row" style="text-align:right;margin:2% 0%;">
                                <div class="col-md-4"><label for="exampleInputName2">เบอร์โทรศัพท์ :</label></div>
                                <div class="col-md-6">
                                        <div class="form-group has-feedback{{ $errors->has('tel_add') ? ' has-error' : '' }}">
                                            <input type="text" name="tel_add" class="form-control" placeholder="เบอร์โทรศัพท์">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                                            @if ($errors->has('tel_add'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('tel_add') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    
                                </div>

                                <div class="col-md-4"><label for="exampleInputName2">เลขบัตรประชาชน :</label></div>
                                <div class="col-md-6">
                                        <div class="form-group has-feedback{{ $errors->has('national_id') ? ' has-error' : '' }}">
                                            <input type="text" name="national_id" class="form-control" placeholder="เลขบัตรประชาชน 13 หลัก">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                                            @if ($errors->has('national_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('national_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    
                                </div>
                            </div>

                            
                            
                            
                            {{-- <div class="form-group has-feedback{{ $errors->has('img_id1') ? ' has-error' : '' }}">
                                <div class="form-group">
                                  <label for="file">หลักฐานรูปหน้าบัตร</label>
                                  <input type="file" class="form-control-file" name="img_id1"  id="img_id1">
                                  <input type="hidden" class="form-control-file" name="img_id1"  id="img_id1">
                                </div>
                            </div>--}}


                            <div class="row">
                                <div class="col-sm-6 imgUp">
                                  <div class="imagePreview  has-feedback{{ $errors->has('img_id1') ? ' has-error' : '' }}"></div>
                                    <label class="btn btn-danger">ถ่ายรูปบัตรประชาชน
                                      <input name="img_id1" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    @if ($errors->has('img_id1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img_id1') }}</strong>
                                        </span>
                                    @endif
                                </div><!-- col-2 -->
                               
                                <i class="fas fa-plus imgAdd"></i>
                                
                            </div><!-- row -->

        
                            <div class="row">
                                <div class="col-xs-8 col-md-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4 col-md-4">
                                    
                                    <button type="submit" class="btn btn-danger btn-block btn-flat">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
        
                        <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
                    </div>
           
        </section>
          
        </div>
        
      </div>
      
      <p><small>Source: <cite><a href="https://www.bjcp.org/stylecenter.php">BJCP Style Guidelines</a></cite></small></p>


    </div>
    {{-- wrapper --}}
</div>
{{-- container --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
            
        $(".imgAdd").click(function(){
                $(this).closest(".row").find('.imgAdd').before(
                '<div class="col-sm-6 imgUp"><div class="imagePreview"></div><label class="btn btn-danger">หลักฐานรูปตนเองพร้อมบัตร<input name="img_id2" type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
                $(".imgAdd").hide();
                });
                $(document).on("click", "i.del" , function() {
                    $(this).parent().remove(); 
                    $(".imgAdd").show();
                });

        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }
            
            });
        });

</script>  
</body>
</html>
