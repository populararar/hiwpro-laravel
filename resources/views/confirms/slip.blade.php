@extends('layouts.hiwpro')

@section('content')
@php
$num = $orderHeaders->total_price;
$formattedNum = number_format($num);  
$sum = 0;
$count = 0;
@endphp
<div class="container">
        <div class="col text-center">
                <h4 style="margin-top: 2%; ">ใบสรุปรายการสั่งซื้อ </h4>
            
              </div>
            
            
                <div class="weapper font-weight-light   " style="margin-top:2%;  ">
            
            
                  <div class="row p-1 border-top">
                    <div class="col-lg-4 ">OrderID :</div>
                    <div class="col-lg-4">{{ $orderHeaders->order_number}}</div>
                  </div>
            
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">ชื่อ:</div>
                    <div class="col-lg-4">{{$user->name}}</div>
                  </div>
            
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">ที่อยู่การจัดส่ง :</div>
                    <div class="col-lg-6">{{$orderHeaders->address}}</div>
                  </div>
            
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">เบอร์โทรศัพท์ :</div>
                    <div class="col-lg-6">{{$orderHeaders->customer->profile->tel}}</div>
                  </div>
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">E-mail : </div>
                    <div class="col-lg-6">{{$user->email}}</div>
                  </div>
                  <!--------------ตารางชื่อสินค้า----------------->
                  <table class="table font-weight-light " style="margin-top: 5%;">
                    <thead>
                      <tr>
                      
                        <th class="font-weight-light">ชื่อสินค้า</th>
                        <th class="font-weight-light">ราคา</th>
                        <th class="font-weight-light">จำนวน</th>
                        <th class="font-weight-light">รวม</th>
                      </tr>
                    </thead>

                    @foreach( $orderHeaders->orderDetails as $item)
                    @php

                        $sum = $item->price * $item->qrt;
                    @endphp
                    <tbody>
                      <td>{{$item->product->name }}</td>
                      <td> {{number_format($item->price) }} </td>
                      <td>{{$item->qrt }}</td>
                      <td>{{number_format($item->price * $item->qrt) }}</td>
            
                    </tbody> 
                    @php
                    
                        $count += $sum;
                    @endphp
                    @endforeach
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($count)}}</td>
              
                      </tbody> 
                  </table>
            
                  <!--------------ตารางชื่อสินค้า----------------->
            
            
                  {{-- <div style="margin-top: 2%;  ">
                    <h9>{{number_format($sum) }}</h9>
                  </div> --}}
            
             <a href="{{route('orders.statusdetail',[ $orderHeaders->order_number])}}"
                           style="text-align:center; width: 50%; float:left;" class="btn btn-outline-secondary">ย้อนกลับ</a>
            <a href="{{route('home')}}"
              style="text-align:center; width: 50%; " class="btn btn-danger">เลือกซื้อสินค้าเพิ่มเติม</a>
              
            
                </div>
           
            
</div>

@endsection

@section('scripts') 
@endsection