<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style>
img.eventJoined{
    border-right: 5px solid #555555;
    padding: 2%; 
    width: 500px;
}
p{
    color: firebrick;
    float: right;
}
</style>
<div class="row">
    <h1 style="font-family:Kanit, sans-serif;text-align:center;">{!! $event->eventName !!}</h1>
    <div class="col-md-6"> <img class="eventJoined" src="{{ asset('/storage/'.$event->imgPath) }}"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-1">
                <p><i class="fas fa-calendar-week"></i></p>
            </div>
            <div class="col-md-11">เริ่มหิ้ว {!! $event->startDate !!}</div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <p><i class="fas fa-calendar-week"></i></p>
            </div>
            <div class="col-md-11">ถึงวันที่ {!! $event->event_exp !!}</div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <p><i class="fas fa-gift"></i></p>
            </div>
            <div style="font-size:1.4em;" class="col-md-11">รายละเอียดสินค้า </div>
        </div>     
    <i class="fas fa-candy-cane"></i>{!! $event->detail !!}

    </div>
</div>



<script>
</script>



