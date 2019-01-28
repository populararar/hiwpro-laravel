<table class="table table-responsive" id="sellerReviews-table">
    <thead>
        <tr>
        <th>User Id</th>
        <th>Score</th>
        <th>Customer Id</th>
        <th>Order Id</th>
        <th>Comment</th>
        <th>Img</th>
        <th>Img2</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sellerReviews as $sellerReview)
        <tr>
            <td>{!! $sellerReview->user_id !!}</td>
            <td>{!! $sellerReview->score !!}</td>
            <td>{!! $sellerReview->customer_id !!}</td>
            <td>{!! $sellerReview->order_id !!}</td>
            <td>{!! $sellerReview->comment !!}</td>
            <td>{!! $sellerReview->img !!}</td>
            <td>{!! $sellerReview->img2 !!}</td>
            <td>
                {!! Form::open(['route' => ['sellerReviews.destroy', $sellerReview->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sellerReviews.show', [$sellerReview->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sellerReviews.edit', [$sellerReview->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>