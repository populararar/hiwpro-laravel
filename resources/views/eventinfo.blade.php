@extends('layouts.hiwpro')

@section('content')
<h1>Event Infomation</h1>

<div class='row' style='border-bottom: 1px solid #cccccc; margin:0 0 5% 0; padding:0 0 3% 0 ;'>
    <div class='.d-md-none col-md-1 '>
      <div class='row'>
        <h6 style='border-bottom: 2px solid #df3433;'>NOV</h6>
      </div>
      <div class='row'>
        <h6>3-6</h6>
      </div>
    </div>
    <div class='col-sm-3 col-md-4 '>
      <img style='border-radius: 10%' src='{{ asset('/storage/'.$event->imgPath) }}' class='img-fluid' alt=''>
    </div>
    <div class='col-sm-8 col-md-7 '>
      <h3 style='font-size:1.5em; border-bottom: 1px dotted #cccccc;'>". $row['eventName'] ."</h3>
      <i style='color: #df3433;' class='far fa-calendar'></i>".$row['startDate']." - ".$row['lastDate']."
      <p class='text-truncate' style='text-overflow: clip;'>
      ". $row['detail'] ."
      </p>

      <div class='line-p'></div>

      <a href="{{  route('event.detail', ['id' => $event->event_id]) }}" style='color: #df3433;'>ดูเพิ่มเติม</a>
    </div>
  </div>





@endsection
