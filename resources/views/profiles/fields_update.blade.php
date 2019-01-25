{{-- @php
    $id = $profiles->user->id;
    dd($id);
@endphp --}}
{{-- @if ($id==1){
   admin
} 
@endif --}}
<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Tel:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::textarea('img', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_id', 'Address Id:') !!}
    {!! Form::number('address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_num', 'Bank Num:') !!}
    {!! Form::text('bank_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', 'Bank Name:') !!}
    {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
</div>

<!-- National Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('national_id', 'National Id:') !!}
    {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
</div>

<!-- National Img Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('national_img', 'National Img:') !!}
    {!! Form::textarea('national_img', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancel</a>
</div>
