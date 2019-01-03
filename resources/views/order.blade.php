@extends('layouts.hiwpro')

@section('content')

<h1>Order </h1>
<div class="container" style="padding: 0 5%;">

        <div class="col">
          <h4 style="margin-top: 2%; color: #df3433;">รายการสั่งซื้อ </h4>
          <p class="h9">สั่งซื้อสินค้ากับหิ้วโปร</p>
        </div>
    
        <div class="form-group">
          <div class="btn-group d-flex justify-content-center ">
            <button style="text-align:center; width: 50%;"  type="button" class="btn btn-danger">รายการสั่งซื้อ</button>
            <button style="text-align:center; width: 50%;"  type="button" class="btn btn-outline-danger">สรุปรายการสั่งซื้อ</button>
            <button style="text-align:center;width:50% "type="button" class="btn btn-outline-danger align-self-center ">ที่อยู่การจัดส่ง</button>
            <button style="text-align:center;width:50% "type="button" class="btn btn-outline-danger align-self-center ">ยืนยันการสั่งซื้อ</button>
          </div>
        </div>
      </p>
  
      <div class="weapper" style="background-color: #F9F9F9; padding:3% 5%; ">
         
          <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>  
                  <th scope="col">รายการสินค้า</th>
                  <th scope="col">ชื่อสินค้า</th>
                  <th scope="col">ราคา</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">รวม</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <th scope="row">1</th>
                    
                    <td> <img src="/Users/Warcom-PT/Desktop/Christmas/public/images/jh2.png" alt="Responsive image"> </td>
                    <td>เสื้อลายเสือ<br>
                          ค่าหิ้ว<br> 
                          ค่าจัดส่ง<br> 
                      
                    </td>
                    <td>290<br>
                      50<br>
                      50
  
                    </td>
                    <td>1</td>
                    <td>390</td>
                  </tr>
                  
                  <tr>
                          <th scope="row">2</th>
                          <td> <img  src="/Users/Warcom-PT/Desktop/Christmas/public/images/jh2.png" alt="Responsive image"> </td>
                          <td>เสื้อลายดอก<br> 
                              ค่าหิ้ว<br>
                              ค่าจัดส่ง
                          </td>
  
                          <td>300<br>
                              50<br>
                              50
                          </td>
  
  
                         
                          <td>2</td>
                          <td>400</td>
                        </tr>
                  </tbody>
                  </table>
  
  
                  <div>
  
                    <a href="#" class="btn btn pull-right btn-primary btn-danger btn-sm " >Update</a>
                   
            
                   </div>
                   <P ALIGN = "RIGHT" > รวมทั้งหมด </P>
  
  
               
                   
                    
              <div class="row">
                <div class="col-lg-12">
                    
                    <button type="button" class="btn btn-success float-right"style="text-align: center; border-radius: 30px;" >ยืนยัน</button>
                </div>
            </div>
                  
    
                </div>
      </div>
@endsection
