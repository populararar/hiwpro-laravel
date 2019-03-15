<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

    <style>
        @font-face {
            font-family: 'dejavusans';
            src: url('/dejavusans-bold-webfont.woff2') format('woff2'),
            url('/dejavusans-bold-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Kanit';
        }
        .line-g{
            width: 100%;
            height: 1px;
            background-color: #606060;
            margin: 3% 0%;
        }
        .line-r{
            width: 30%;
            height: 2px;
            position: relative;
            background-color: #cf2132;
        }

    </style>
</head>

<body>
   <br>
    <br>
    <br>
    <br>
<h5 style="text-align:center;">รายการสินค้า</h5>
<br>
<br>
    @foreach ($orderGroup as $key => $group)
    @php
    $a = collect($group)->first();
    @endphp
    {{-- <div class="line-g">
        <div class="line-r">
        </div>
    </div> --}}
 @foreach ( $group as $item) 
    <div class="row" style="margin-bottom:2.5%;">
        
        @php
        $pId = $item['product']->product_id;
        $eventShopId = $item['event_shop_id'];
        @endphp

        <div class="col-md-4" style="float:left; ">
        <img width="150px" style="float:right;"
         src="{{ asset('/storage/'.$item['product']->image_product_id) }}" class="pull-right img-fluid">
        </div>

        <div class="col-md-8" style="float:left; ">
            <b> ชื่ออีเว้นต์ : </b>{{ $a['event_shop']->shop->name }}<b>
            <br>สถานที่ : </b>{{$a['event_shop']->shop_location->location_name}}</p>
            <p>ชื่อสินค้า : {{  $item['product']->name  }}</p>
            <p>จำนวน : {{ $item['qrt'] }} </p>
        </div>
    </div>
        @endforeach
  
    @endforeach

    <script>
        $(document).ready(function () {
            window.print();
        })
    </script> 

</body>

</html>