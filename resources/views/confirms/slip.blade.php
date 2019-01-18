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
   
    <div class="weapper" style="margin-top: 2%;  padding:3% 5%; ">
        <div class="row">
        <div class="col-lg-12 p-1 border-top"></div>
        <div class="col-lg-2">OrderID :</div>
        <div class="col-lg-4">{{ $orderHeaders->order_number}}</div>
        </div>

        <div class="row">

        <div class="col-lg-12 p-1 border-top"></div>
        <div class="col-lg-2">ชื่อ-สกุล :</div>
        <div class="col-lg-4">{{$user->name}}</div>
        </div>
        <div class="row">

        <div class="col-lg-12 p-1 border-top"></div>
        <div class="col-lg-2">ที่อยู่การจัดส่ง :</div>
        <div class="col-lg-6">{{$orderHeaders->address}}</div>
        </div>

        <div class="row">

        <div class="col-lg-12 p-1 border-top"></div>
        <div class="col-lg-2">เบอร์โทรศัพท์ :</div>
        <div class="col-lg-6">0623152625</div>
        </div>

        <div class="row">

        <div class="col-lg-12 p-1 border-top"></div>
        <div class="col-lg-2">E-mail : </div>
        <div class="col-lg-6">{{$user->email}}</div>
        </div>


        <table class="table" style="margin-top: 5%;">
        <thead>
            <tr>
            <th scope="col">...</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">ราคา</th>
            <th scope="col">จำนวน</th>
            <th scope="col">รวม</th>
            </tr>
        </thead>
        <tbody>
            <td>
            ...
            </td>
            <td>เสื้อลายเสือ</td>
            <td>300</td>
            <td>2</td>
            <td>600</td>
        </tbody>
        </table>

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