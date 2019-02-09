@extends('layouts.hiwpro')

@section('content')
<style>    
</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" style="padding: 0 5%;">
    
        <div class="wrapper" style=" padding:3%; ">
        
                <div class="mx-auto topic">
                    <h1><i class="fas fa-money-check-alt"></i></h1>
                    <h1>ข้อมูลการซื้อของลูกค้า </h1>
                    <div class="under_topic"></div>
                </div>
                  @include('flash::message')       
                <div class="shadow">
            <div style="overflow-x:auto;">
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
                        </tr>
                @endforeach
                    </tbody> 
                </table>
            </div>
                </div>
   
</div>

@endsection

@section('scripts')

<script>

 
</script>
@endsection