<table class="table table-responsive" id="reportAdmins-table">
    <thead>
        <tr>
            <th>Address</th>
        <th>Order Date</th>
        <th>Exp Date</th>
        <th>Slip Status</th>
        <th>Total Price</th>
        <th>Tracking Number</th>
        <th>Customer Id</th>
        <th>Shipping Id</th>
        <th>Shipping Date</th>
        <th>Payment Date</th>
        <th>Accepted Date</th>
        <th>Status</th>
        <th>Order Number</th>
        <th>Payment Id</th>
        <th>Seller Id</th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Seller Actual Price</th>
        <th>Seller Actual At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reportAdmins as $reportAdmin)
        <tr>
            <td>{!! $reportAdmin->address !!}</td>
            <td>{!! $reportAdmin->order_date !!}</td>
            <td>{!! $reportAdmin->exp_date !!}</td>
            <td>{!! $reportAdmin->slip_status !!}</td>
            <td>{!! $reportAdmin->total_price !!}</td>
            <td>{!! $reportAdmin->tracking_number !!}</td>
            <td>{!! $reportAdmin->customer_id !!}</td>
            <td>{!! $reportAdmin->shipping_id !!}</td>
            <td>{!! $reportAdmin->shipping_date !!}</td>
            <td>{!! $reportAdmin->payment_date !!}</td>
            <td>{!! $reportAdmin->accepted_date !!}</td>
            <td>{!! $reportAdmin->status !!}</td>
            <td>{!! $reportAdmin->order_number !!}</td>
            <td>{!! $reportAdmin->payment_id !!}</td>
            <td>{!! $reportAdmin->seller_id !!}</td>
            <td>{!! $reportAdmin->name !!}</td>
            <td>{!! $reportAdmin->lastname !!}</td>
            <td>{!! $reportAdmin->email !!}</td>
            <td>{!! $reportAdmin->seller_actual_price !!}</td>
            <td>{!! $reportAdmin->seller_actual_at !!}</td>
            <td>
                {!! Form::open(['route' => ['reportAdmins.destroy', $reportAdmin->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reportAdmins.show', [$reportAdmin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reportAdmins.edit', [$reportAdmin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>