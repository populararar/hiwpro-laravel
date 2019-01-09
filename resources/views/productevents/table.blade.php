<link href="https://fonts.googleapis.com/css?family=Kanit|Open+Sans" rel="stylesheet">


@foreach($productevents as $event)
<?php
   
    $name = $event->eventshop->event->eventName;
    $img = $event->eventshop->event->imgPath;
    $detail = $event->eventshop->event->detail;
?>
@endforeach
<style>

.post-title-alt:after, .block-head-b .title {
    border-bottom: 1px solid #cf2132;
}
.block-head-b .title {
    display: inline-block;
    margin-bottom: -1px;
    padding: 0 1px;
    padding-bottom: 8px;
    border-bottom: 1px solid #318892;
    font-size: 17px;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.2;
}
</style>
<div class="wrapper" style="background:white; font-family: Kanit;">                
    <h2 class="title" style="border-bottom: 1px solid #cf2132; font-family: Kanit;"> Event name </h2>
    <div class="row">
        <div class="col-sm-4">
            @if(!empty($event->eventshop->event->eventName))
            <img src="{{ asset('/storage/'.$img) }}" alt="" class="img-responsive">
           
        </div>
        <div class="col-sm-8" style="font-family: Kanit; float:l">
            <h3 style="font-family: Kanit;">{{$name}}</h3>
            <p>{{$detail}}</p>
        </div>
        @endif
    </div>
</div>

<table class="table table-responsive" id="productevents-table">
    <thead>
        <tr>
            <th>Sale Price</th>
            {{-- <th>Event img</th>
            <th>Event Shop Id</th> 
            <th>Event Shop name</th>--}}
            @if(!empty($productevent->product->image_product_id))
            <th>Product Img</th>@endif
            
            <th>Product Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productevents as $productevent)
        <tr>
            <td>{!! $productevent->sale_price !!}</td>
            {{-- <td><img src="{{ asset('/storage/'.$productevent->eventshop->event->imgPath) }}" alt="" width="50"></td>
            <td>{!! $productevent->event_shop_id !!}</td>
            <td>{!! $productevent->eventshop->event->eventName !!}</td> --}}
            @if(!empty($productevent->product->image_product_id))
            <td><img src="{{ asset('/storage/'.$productevent->product->image_product_id) }}" alt="" width="50"></td>
            @endif
            <td>{!! $productevent->product->name !!}</td>
            <td>
                {!! Form::open(['route' => ['productevents.destroy', $productevent->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productevents.show', [$productevent->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('productevents.edit', [$productevent->id]) !!}" class='btn btn-warning btn-xs'><i
                            class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn
                    btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>