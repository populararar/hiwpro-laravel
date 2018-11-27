<!-- Eventname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventName', 'Eventname:') !!}
    {!! Form::text('eventName', null, ['class' => 'form-control']) !!}
</div>

<!-- Startdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startDate', 'Startdate:') !!}
    {!! Form::text('startDate', null, ['class' => 'form-control date-picker']) !!}
</div>

<!-- Lastdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastDate', 'Lastdate:') !!}
    {!! Form::text('lastDate', null, ['class' => 'form-control date-picker']) !!}
</div>

<div class="clearfix"></div>
<div class="form-group col-sm-6">
    {!! Form::label('imgPath', 'Imgpath:') !!}
    {!! Form::hidden('imgPath', $event->imgPath,[]) !!}
    <img src="{{ asset('/storage/'.$event->imgPath) }}" alt="" width="250">
</div>
<div class="clearfix"></div>

<!-- Imgpath Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imgPath', 'Imgpath:') !!}
    {!! Form::file('imgPathUpdate') !!}
</div>
<div class="clearfix"></div>

<!-- Event Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_type', 'Event Type:') !!}
    {!! Form::select('event_type', ['SPONSER' => 'Sponser', 'CONTENT' => 'Content Free'], null, ['class' => 'form-control']) !!}
</div>

<!-- Event Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event_exp', 'Event Exp:') !!}
    {!! Form::text('event_exp', null, ['class' => 'form-control date-picker']) !!}
</div>

<!-- Detail Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income', 'Income:') !!}
    {!! Form::number('income', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('events.index') !!}" class="btn btn-default">Cancel</a>
</div>



@section('scripts')
    <script>
    // In your Javascript (external .js resource or <script> tag)
    // $(document).ready(function() {
    //     $('#robots').select2();
    // });

    $(function () {
        $('.date-picker').datetimepicker({
           // format: 'YYYY-MM-DD HH:mm:ss'
            format: 'YYYY-MM-DD'
        });
    });
    </script>
@endsection
