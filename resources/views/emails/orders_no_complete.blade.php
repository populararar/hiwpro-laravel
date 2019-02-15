
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หิ้วโปร</title>
</head>
<body>
    
<h1>กรุณาตรวจสอบสินค้าที่ได้รับในระบบ</h1>
<br>
     <p> กรุณาตรวจสอบรายการสินค้าที่ท่านได้รับหากได้รับสินค้าไม่ตรงตามจำนวนที่ทำการสั่งซื้อ 
        เนื่องจากสินค้าหมด ทางหิ้วโปรจะทำการโอนเงินคืนในส่วนของรายการสินค้าที่ท่านไม่ได้รับและกรุณาแจ้งช่องทางการติดต่อเพื่อรับเงินคืน
        </p>  
      
<a href="{{ route('orders.statusdetail',[ $order->order_number]) }}">ตรวจสอบรายการสินค้าของท่าน</a>
 <p>ติดต่อหิ้วโปร</p>
 <p>Call center : 062-9159535 </p>
 <p>E-mail : hiwpro.website@gmail.com</p>
 <p>บริษัท หิ้วโปร จำกัด</p>
</body>
</html>
