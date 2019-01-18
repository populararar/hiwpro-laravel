<table class="table table-responsive" id="payments-table">
    <thead>
        <tr>
            <th>Img Path</th>
        <th>Total</th>
        <th>Bank From</th>
        <th>Bank To</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td><img src="{{ asset('/storage/'.$payment->img_path) }}" alt="" width="50"></td>
           
            <td>{!! $payment->total !!}</td>
            <td>{!! $payment->bank_from !!}</td>
            <td>{!! $payment->bank_to !!}</td>
            <td>{!! $payment->status !!}</td>
            <td>
                {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('payments.show', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('payments.edit', [$payment->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>