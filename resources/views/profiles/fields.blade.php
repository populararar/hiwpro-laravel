<style>
    .container {
        text-align: center;
    }
</style>

<div class="container">
    <h3 style="margin-top:3%;"><i class="fas fa-user-alt"></i></h3>
    <h3>รายละเอียดส่วนตัว</h3>

    <div class="alert alert-primary" role="alert">
           สำรองข้อมูลกรณีที่สั่งสินค้าแล้วไม่ได้รับตามจำนวน <a href="#" class="alert-link">นโยบายบริษัท</a> กรุณาอ่านรายละเอียด
        </div>
    {{-- ************** --}}

<!-- Img Field -->

<div class="clearfix"></div>
<div class="form-group col-sm-12">
    {!! Form::hidden('img', $profile->img,[]) !!}
    <img src="{{ asset('/storage/'.$profile->img) }}" alt="" width="250">
</div>
 {!! Form::label('img', 'Img path:') !!}
                {!! Form::file('imgUpdate') !!}
<div class="clearfix"></div>

<!-- Imgpath Field -->

    {{-- ********** --}}
    <div class="row" style="text-align:right;margin:2% 0%;">
  

        <div class="col-md-4"><label for="exampleInputName2">ชื่อ :</label></div>
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" name="name" class="form-control" value="{{$user_id->name}}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-4"><label for="exampleInputName2">เบอร์โทร :</label></div>
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('tel') ? ' has-error' : '' }}">
                <input type="text" name="tel" class="form-control" value="{{$profile->tel}}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('tel'))
                <span class="help-block">
                    <strong>{{ $errors->first('tel') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-4"><label for="exampleInputName2">ชื่อบัญชี :</label></div>
        <div class="col-md-6">
            <div class="form-group has-feedback{{ $errors->has('bank_account') ? ' has-error' : '' }}">
                <input type="text" name="bank_account" class="form-control" value="{{$profile->bank_account}}">
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
            <input type="text" name="bank_num" class="form-control" value="{{$profile->bank_num}}">
                @if ($errors->has('bank_num'))
                <span class="help-block">
                    <strong>{{ $errors->first('bank_num') }}</strong>
                </span>
                @endif
            </div>
        </div>
   
        <div class="col-md-4"><label for="exampleInputName2">ชื่อธนาคาร :</label></div>
        <div class="col-md-6">
            <select name="bank_name" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="{{$profile->bank_name}}" selected>{{$profile->bank_name}}</option>
                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
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


    @if($roleName=="SELLER")

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="form-group col-sm-6">
            {!! Form::hidden('national_img', $profile->national_img,[]) !!}
            <img src="{{ asset('/storage/'.$profile->national_img) }}" alt="" width="250">
        </div>

        <div class="form-group col-sm-6">
            {!! Form::hidden('national_img2', $profile->national_img2,[]) !!}
            <img style="float:left;" src="{{ asset('/storage/'.$profile->national_img2) }}" alt="" width="250">
        </div>
    </div>

    <input name="user_id" type="hidden" class="form-control">

    @endif
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        <a href="{!! route('profiles.index') !!}" class="btn btn-default col-3">ยกเลิก</a>
        {!! Form::submit('บันทึกการเปลี่ยนแปลง', ['class' => 'btn btn-danger col-3']) !!}
    </div>

</div>

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