<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('font/stylesheet.css') }}" type="text/css" charset="utf-8"> --}}
    <style>
        @font-face {
            font-family: 'dejavusans';
            src: url('/dejavusans-bold-webfont.woff2') format('woff2'),
            url('/dejavusans-bold-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'dejavusans';
        }

    </style>
</head>

<body>

    @foreach ($orderGroup as $key => $group)
    @php
    $a = collect($group)->first();
    @endphp
    <div class="line-g">
        <div class="line-r">
        </div>
    </div>
    {{-- {{dd($a['event_shop']->shop->name,$a['event_shop']->shop_location->location_name)}} --}}
    <b> ชื่ออีเว้นต์ : </b>{{ $a['event_shop']->shop->name }}<b>
        <br>สถานที่ : </b>{{$a['event_shop']->shop_location->location_name}}</p>
    <div class="row">
        @foreach ( $group as $item)
        {{--      
                  <img width="150px" class="circle" style="border-radius: 10%"
                  src="{{ asset('/storage/'.$item['product']->image_product_id) }}" class="img-fluid"> --}}

        @php
        $pId = $item['product']->product_id;
        $eventShopId = $item['event_shop_id'];
        @endphp
       
            <p>ชื่อสินค้า<br>{{  $item['product']->name  }}</p>
       
        <p>จำนวน : {{ $item['qrt'] }} </p>
        </p>

        @endforeach
    </div>
    @endforeach

    <!-- <script>
        $(document).ready(function () {
            window.print();
        })
    </script> -->

</body>

</html>