
<table class="table table-responsive" id="payments-table">
    <thead>
        <tr>
        <th>Order No.</th>
        <th>Total</th>
        <th>Bank From</th>
        <th>Bank To</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            {{-- <td><img src="{{ asset('/storage/'.$payment->img_path) }}" alt="" width="50"></td> --}}
            <td>{!! $payment->order->order_number !!}</td>
            <td>{!! number_format($payment->total) !!}</td>
            <td>{!! $payment->bank_from !!}</td>
            <td>{!! $payment->bank_to !!}</td>
            @if (!empty($payment->status))
                <td><p class='btn btn-info'>ยืนยันเรียบร้อย</p></td>
            @else
                <td ><a href="{!! route('payments.edit', [$payment->id]) !!}"><p class='btn btn-warning'>รอการตรวจสอบ</button></p></td>
            @endif
           
            <td>
                {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('payments.show', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a> --}}
                    <a href="{!! route('payments.edit', [$payment->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@section('scripts')
    <script>
    $(document).ready( function () {
    $('#payments-table').DataTable();
} );
    </script>
@endsection