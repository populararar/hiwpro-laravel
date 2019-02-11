<table class="table table-responsive" id="reportSellers-table">
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
    @foreach($reportSellers as $reportSeller)
        <tr>
            <td>{!! $reportSeller->address !!}</td>
            <td>{!! $reportSeller->order_date !!}</td>
            <td>{!! $reportSeller->exp_date !!}</td>
            <td>{!! $reportSeller->slip_status !!}</td>
            <td>{!! $reportSeller->total_price !!}</td>
            <td>{!! $reportSeller->tracking_number !!}</td>
            <td>{!! $reportSeller->customer_id !!}</td>
            <td>{!! $reportSeller->shipping_id !!}</td>
            <td>{!! $reportSeller->shipping_date !!}</td>
            <td>{!! $reportSeller->payment_date !!}</td>
            <td>{!! $reportSeller->accepted_date !!}</td>
            <td>{!! $reportSeller->status !!}</td>
            <td>{!! $reportSeller->order_number !!}</td>
            <td>{!! $reportSeller->payment_id !!}</td>
            <td>{!! $reportSeller->seller_id !!}</td>
            <td>{!! $reportSeller->name !!}</td>
            <td>{!! $reportSeller->lastname !!}</td>
            <td>{!! $reportSeller->email !!}</td>
            <td>{!! $reportSeller->seller_actual_price !!}</td>
            <td>{!! $reportSeller->seller_actual_at !!}</td>
            <td>
                {!! Form::open(['route' => ['reportSellers.destroy', $reportSeller->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reportSellers.show', [$reportSeller->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reportSellers.edit', [$reportSeller->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>