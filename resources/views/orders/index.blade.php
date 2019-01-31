@extends('layouts.hiwpro')

@section('content')
<style>
    h1 {
    text-align: center;
}

.tabs {
    list-style: none;
    margin: 0;
    padding: 0;
}

.tabs li {
    display: inline-block;
    padding: 15px 25px;
    background: none;
    text-transform: uppercase;
    cursor: pointer;
}


.tabs li.current {
    background: #fff;
    border: 1px solid #2311;
    border-bottom: 1px solid #cf2132;
}
.tab-contents {
    background: #fff;
    padding: 20px;
    border-top: 1px solid #ddd;
}

.tab-pane {
    display: none;
}

.tab-pane.current {
    display: block;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 0;
    background-color: transparent;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: 0%;
    border-top: 1px solid #dee2e6;
}
*, ::after, ::before {
    /* box-sizing: border-box; */
}
.page-header {
    padding-bottom: 9px;
    margin: 40px 0 20px;
    border-bottom: 1px solid #eee;
  }
</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" style="padding: 0 5%;">

    <div class="col-12" style="border-bottom:1px solid eee !important;">
        <h4 style="margin-top: 2%;">ข้อมูลการซื้อของลูกค้า </h4>
    </div>


    <div class="weapper" style="background-color: #fff; padding:3%; border-top:1px solid gray; ">
        

                          
                   
                    
                            <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">รหัสออร์เดอร์</th>
                                        <th scope="col">ชื่อผู้ส่ง</th>
                                        <th scope="col">วันที่สั่ง</th>
                                        <th scope="col">ราคาทั้งหมด</th>
                                        <th scope="col">สถานะการจ่ายเงิน</th>
                                      </tr>
                                    </thead>
                                    <tbody>  
                                @foreach ($orderHeaders as $key => $order)
                                @php
                                    $num = $order->total_price;
                                    $formattedNum = number_format($num);
                                    
                                @endphp
                               
                                      <tr>
                                        <td scope="row">{{ $order->order_number }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $order->order_date}}</td>
                                        <td>{{ $formattedNum }} บาท</td>
                                        <td>
                                        <a href="{{route('orders.statusdetail',[ $order->order_number])}}" class="btn btn-info">ดูข้อมูลเพิ่มเติม</a>
                                           
                                        </td>
                                      </tr>@endforeach
                                    </tbody> 
                                  </table>

        
    </div>
   
</div>

@endsection

@section('scripts')

<script>
$(function() {
    $('.tabs li').on('click', function() {
        var tabId = $(this).attr('data-tab');

        $('.tabs li').removeClass('current');
        $('.tab-pane').removeClass('current'); 

        $(this).addClass('current');
        $('#' + tabId).addClass('current');
    });
});
 
</script>
@endsection