<table class="table table-responsive" id="profiles-table">
    <thead>
        <tr>
            <th>Tel</th>
        <th>Img</th>
        <th>Address Id</th>
        <th>Bank Num</th>
        <th>Bank Name</th>
        <th>National Id</th>
        <th>National Img</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $profile->tel !!}</td>
            <td>{!! $profile->img !!}</td>
            <td>{!! $profile->address_id !!}</td>
            <td>{!! $profile->bank_num !!}</td>
            <td>{!! $profile->bank_name !!}</td>
            <td>{!! $profile->national_id !!}</td>
            <td>{!! $profile->national_img !!}</td>
            <td>{!! $profile->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>