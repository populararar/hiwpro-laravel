@extends('layouts.hiwpro')

@section('content')
@php
$num = $orderHeaders->total_price;
$formattedNum = number_format($num);  
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
                    <div class="col-lg-4">สกุล :</div>
                    <div class="col-lg-4">คิม</div>
                  </div>
            
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">ที่อยู่การจัดส่ฆง :</div>
                    <div class="col-lg-6">{{$orderHeaders->address}}</div>
                  </div>
            
                  <div class="row  p-1 border-top">
                    <div class="col-lg-4">เบอร์โทรศัพท์ :</div>
                    <div class="col-lg-6">0623152625</div>
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
            
                    <tbody>
                      <td>Shine Control Sheer Face Powder SPF15 PA+++ </td>
                      <td>300</td>
                      <td>2</td>
                      <td>600</td>
            
                    </tbody>
                  </table>
            
                  <!--------------ตารางชื่อสินค้า----------------->
            
            
                  <div style="margin-top: 2%;  ">
                    <h9>รวมทั้งหมด 600 บาท </h9>
                  </div>
            
            
                  <div class="form-group" style="margin-top: 2%;  ">
                    <div class="btn-group d-flex justify-content-center">
                      <button style="text-align:center; width: 50%;" type="button" class="btn btn-outline-secondary">ย้อนกลับ</button>
                      <button style="text-align:center; width: 50%;" type="button" class="btn btn-danger">เลือกซื้อสินค้าเพิ่มเติม</button>
                    </div>
                  </div>
            
                </div>
           
            
</div>

@endsection

@section('scripts') 
@endsection