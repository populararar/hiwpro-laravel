<!-- Event Id Field -->
<div class="form-group">
    {!! Form::label('event_id', 'Event Id:') !!}
    <p>{!! $event->event_id !!}</p>
</div>

<!-- Eventname Field -->
<div class="form-group">
    {!! Form::label('eventName', 'Eventname:') !!}
    <p>{!! $event->eventName !!}</p>
</div>

<!-- Startdate Field -->
<div class="form-group">
    {!! Form::label('startDate', 'Startdate:') !!}
    <p>{!! $event->startDate !!}</p>
</div>

<!-- Lastdate Field -->
<div class="form-group">
    {!! Form::label('lastDate', 'Lastdate:') !!}
    <p>{!! $event->lastDate !!}</p>
</div>

<!-- Imgpath Field -->
<div class="form-group">
    {!! Form::label('imgPath', 'Imgpath:') !!}
    <p><img src="{{ asset('/storage/'.$event->imgPath) }}" alt="" width="250"></p>
</div>

<!-- Event Type Field -->
<div class="form-group">
    {!! Form::label('event_type', 'Event Type:') !!}
    <p>{!! $event->event_type !!}</p>
</div>

<!-- Detail Field -->
<div class="form-group">
    {!! Form::label('detail', 'Detail:') !!}
    <p>{!! $event->detail !!}</p>
</div>



