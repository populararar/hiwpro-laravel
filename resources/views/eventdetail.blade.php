@extends('layouts.hiwpro')

@section('content')
<div class="row">
    <h1>Event Detail</h1>
    <div class='card01 col-xs-12  col-sm-12 col-md-3' style='margin:0%; float:left;'>
        <img class='card-img-top' style='border-radius: 10%' src='{{ asset('/storage/'.$event->imgPath) }}'>
        <div class='card-body'>
            {{ $event->name}}<br>
            <p class='text-truncate' style='text-overflow: clip; font-size:0.8em;'>{{ $event->detail }}</p>
            <p style='text-decoration: line-through;'>
                {{ $event->actual_price }} </p>
            <p style='color:red; font-size:1.4em;'> {{ $event->sale_price }} </p>
            <a href='{{  route('event.detail.product', ['id' => $event->product_id]) }}' style='color: #df3433;'>ดูเพิ่มเติม</a>
        </div>
    </div>

    @foreach ($productEvents as $pe)
    <p style='color:red; font-size:1.4em;'> {{  $pe->product->name }} </p>
    @endforeach

</div>

@endsection