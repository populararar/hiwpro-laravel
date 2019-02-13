@extends('layouts.hiwpro')

@section('content')
<style>   
.form-inline {
    display: -ms-flexbox;
    display: flow-root;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
} 
</style>

@php
$sum=0;$count=0;$count2=0;
@endphp

<div class="container" >
    
        <div class="wrapper" >
        
                <div class="mx-auto topic">
                    <h1><i class="fas fa-money-check-alt"></i></h1>
                    <h1>ข้อมูลการซื้อของลูกค้า </h1>
                    <div class="under_topic"></div>
                </div>
                  @include('flash::message')       
                <div class="shadow">

                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:5%;">
                            <li class="nav-item">
                                <a class="nav-link active" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">ที่ต้องชำระ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="sent" aria-selected="false">สินค้าที่ต้องได้รับ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">เงื่อนไขการใช้งาน</a>
                            </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab"> 
                                <div class="container my-3">
                                {{-- content 1--}}
                                <div style="overflow-x:auto; text-truncate" > 
                                <table class="table table-hover col-12" id="history-table" >
                                        <thead>
                                            <tr>
                                            <th scope="col">รหัสออร์เดอร์ <i class="fas fa-sort"></i></i></th>
                                            <th scope="col">ชื่อผู้ส่ง <i class="fas fa-sort"></i></i></th>
                                            <th scope="col">วันที่สั่ง <i class="fas fa-sort"></i></i></th>
                                            <th scope="col">ราคาทั้งหมด <i class="fas fa-sort"></i></i></th>
                                            <th scope="col">สถานะการจ่ายเงิน <i class="fas fa-sort"></i></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                    @foreach ($orderHeaders as $key => $order)
                                    @php
                                        $num = $order->total_price;
                                        $formattedNum = number_format($num);
                                        $status = $order->slip_status;

                                        $status_show = '';
                                        if($status == 'WAITING')
                                        {
                                            $status_show = 'รอการชำระเงิน';
                                        }
                                        if($status == 'UPLOADED')
                                        {
                                            $status_show = 'รอตรวจสอบ';
                                        }
                                        if($order->status == 'CONFIRMED')
                                        {
                                            $status_show = 'คำสั่งซื้อสำเร็จ';
                                        }
                                        if($order->status == 'COMPLETED')
                                        {
                                            $status_show = 'จัดส่งสินค้าแล้ว';
                                        }
                                        
                                    @endphp
                                   
                                            <tr class="text-truncate">
                                            <td scope="row">{{ $order->order_number }}</td>
                                            <td class="text-truncate">{{ $user->name }}</td>
                                            <td>{{ $order->order_date}}</td>
                                            <td>{{ $formattedNum }} บาท</td>
                                            <td>
                                                    @if($status == 'WAITING')
                                                    <a href="{{route('orders.statusdetail',[ $order->order_number])}}" class="font-weight-light btn btn-warning">รอการชำระเงิน</a>
                                                    @endif
                                                    @if($status == 'UPLOADED')
                                                    <a href="{{route('orders.statusdetail',[ $order->order_number])}}" class="font-weight-light btn btn-info">รอการอนุมัติ</a>
                                                    @endif
                                    {{-- <a href="{{route('orders.statusdetail',[ $order->order_number])}}" class="btn btn-info">{{$status_show}}</a> --}}
                                                
                                            </td>
                                            </tr>
                                    @endforeach
                                        </tbody> 
                                    </table>
                                </div>         
                                {{-- end history --}}
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                                <div class="container my-3">
                                {{-- content 2  --}}
                                <table class="table table-hover " id="notifications-table">
                                        <thead>
                                            <tr>
                                            <th>รหัสออร์เดอร์</th>
                                            <th>หิ้วโดย</th>
                                            <th>ชื่อผู้ส่ง</th>
                                            <th>สถานะการจัดส่ง</th>
                                            <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($notifications as $notification)
                                    @php
                                      $status =  $notification->status;
                                            $read="";
                                    @endphp
                                            @if ($status == 1)
                                                <tr class="table-danger">@php $read = "ยังไม่อ่าน"; @endphp           
                                            @else
                                            <tr> @php $read = "อ่านแล้ว"; @endphp 
                                    
                                            @endif
                                            @php
                                            if($notification->orderHeader->status == 'CONFIRMED')
                                            {
                                                $status_show = 'คำสั่งซื้อสำเร็จ';
                                            }
                                            if($notification->orderHeader->status == 'COMPLETED')
                                            {
                                                $status_show = 'จัดส่งสินค้าแล้ว';
                                            }
                                            @endphp
                                            
                                                <td>
                                                    {{-- <a href="{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}" >
                                                {!! $notification->orderHeader->order_number !!}</a> --}}
                                                    <a href="#" onclick="javascript:read('{{$notification->orderHeader->order_number}}' , '{{ $notification->id }}')">
                                                            {!! $notification->orderHeader->order_number !!}
                                                    </a>
                                        
                                            </td>
                                                <td>{!! $notification->order_id !!}</td>
                                                <td>{!! $notification->user_id !!}</td>
                                                <td>{!! $notification->title !!}</td>
                                                
                                                <td > <p>
                                                    {{$status_show}}
                                                    {{$notification->orderHeader->status}} - {{$order->slip_status}}</p></td>
                                                
                                                    
                                                    {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' => 'delete']) !!}
                                                    <div class='btn-group'>
                                                        <a href="{!! route('notifications.show', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                        {{-- <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                                                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                    <script>
                                    function read(order_number,id){
                                        // alert(order_number)
                                        $.ajax({
                                            url:'{{ route('notifications.index') }}/'+id+'/read',
                                            method:'GET',
                                            success:function(){
                                                window.location.href = "{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}"
                                            }
                                        })
                                    }
                                    </script>
                                    
                                   
                                {{-- end notification --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                {{-- content 3 --}}
                            </div>
                            </div>
                        
                            {{-- tab --}}





         
                </div>

                <div class="wrapper">
                    <div class="card">
                        <h2>สถานะการสั่งซื้อ</h2>
                        <p>รอการชำระเงิน</p>
                        <p>รอตรวจสอบ</p>
                        <p>คำสั่งซื้อสำเร็จ</p>
                        <p>จัดส่งสินค้าแล้ว</p>
                    </div>
                </div>
   
</div>

@endsection

@section('scripts')

<script>
        $(document).ready( function () {
        $('#notifications-table').DataTable();
    } );
    
    $(document).ready( function () {
    $('#history-table').DataTable();
    } );
   
        </script>
@endsection