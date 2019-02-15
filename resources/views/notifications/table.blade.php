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
                            @if (count($notifications)> 0)
                            <tbody>
                                @foreach($notifications as $notification)
                                @php
                                $status = $notification->status;
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
                                        {{-- <a href="{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}"
                                        >
                                        {!! $notification->orderHeader->order_number !!}</a> --}}
                                        <a href="#"
                                            onclick="javascript:read('{{$notification->orderHeader->order_number}}' , '{{ $notification->id }}')">
                                            {!! $notification->orderHeader->order_number !!}
                                        </a>

                                    </td>
                                    <td>{!! $notification->order_id !!}</td>
                                    <td>{!! $notification->user_id !!}</td>
                                    <td>{!! $notification->title !!}</td>

                                    <td>
                                        <p>
                                            {{$status_show}}
                                            {{-- {{$notification->orderHeader->status}} - {{$order->slip_status}}</p> --}}
                                    </td>


                                    {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' =>
                                    'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('notifications.show', [$notification->id]) !!}"
                                            class='btn btn-default btn-xs'><i
                                                class="glyphicon glyphicon-eye-open"></i></a>
                                        {{-- <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                                    </div>
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            
                        </table>
                    </div>
                    @if (count($notifications)> 0)
                    <script>
                        function read(order_number, id) {
                            // alert(order_number)
                            $.ajax({
                                url: '{{ route('notifications.index') }}/'+id + '/read',
                                method: 'GET',
                                success: function () {
                                    window.location.href = "{{route('orders.statusdetail',[ $notification->orderHeader->order_number])}}"
                                }
                            })
                        }
                    </script>
                    @endif


@section('scripts')
 
@endsection