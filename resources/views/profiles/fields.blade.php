<style>
.container{
    text-align: center;
}
</style>

<div class="container">
    <h3 style="margin-top:3%;"><i class="fas fa-user-alt"></i></h3>
    <h3>กรอกข้อมูลส่วนตัว</h3>

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label  class=" w-5" for="inputname_card">เบอร์โทรศัพท์ : </label></div>
        <div class="col-md-6">
            <input name="tel" type="text" class="form-control">
        <input name="tel" type="hidden" class="form-control" >
        </div>
    </div>

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label  class=" w-5" for="inputname_card">รูปประจำตัว : </label></div>
        <div class="col-md-6">
        <input name="img" type="file" class="form-control">
        <input name="img" type="hidden" class="form-control" >
        </div>
    </div>

    @if($roleName=="SELLER")

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label  class=" w-5" for="inputname_card">เลขธนาคาร : </label></div>
        <div class="col-md-6">
            <input name="bank_num" type="text" class="form-control">
        <input name="bank_num" type="hidden" class="form-control" >
        </div>
    </div>
    
    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label for="inputname_card" style="margin-left:10px;">ธนาคาร : </label></div>
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
                <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบี ไทย</option>
                <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                <option value="ธนาคารนครหลวงไทย">ธนาคารนครหลวงไทย</option>
                <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                <option value="ธนาคารไอซีบีซี">ธนาคารไอซีบีซี (ไทย)</option>
                <option value="ธนาคารอื่นๆ">ธนาคารอื่นๆ</option>
            </select>
        </div>
    </div>

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label  class=" w-5" for="inputname_card">รูปบัตรประชาชน : </label></div>
        <div class="col-md-6">
            <input name="national_id" type="file" class="form-control">
        <input name="national_id" type="hidden" class="form-control" >
        </div>
    </div>

    <div class="row" style="text-align:right;margin:2% 0%;">
        <div class="col-md-4"><label  class=" w-5" for="inputname_card">รูปประจำตัวพร้อมบัตรประชาชน : </label></div>
        <div class="col-md-6">
            <input name="national_img" type="file" class="form-control">
        <input name="national_img" type="hidden" class="form-control" >
        </div>
    </div>

    <div class="row" style="text-align:right;margin:2% 0%;">
            <div class="col-md-4"><label  class=" w-5" for="inputname_card">รูปประจำตัวพร้อมบัตรประชาชน : </label></div>
            <div class="col-md-6">
                <input name="national_img" type="file" class="form-control">
            <input name="national_img2" type="hidden" class="form-control" >
            </div>
        </div>

    <input name="user_id" type="hidden" class="form-control"  >

    @endif
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancel</a>
    </div>

</div>