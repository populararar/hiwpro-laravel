<table class="table table-responsive" id="userRoles-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Role Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userRoles as $userRoles)
        <tr>
            <td>{!! $userRoles->user_id !!}</td>
            <td>{!! $userRoles->role_id !!}</td>
            <td>{!! $userRoles->status !!}</td>
            <td>
                {!! Form::open(['route' => ['userRoles.destroy', $userRoles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userRoles.show', [$userRoles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userRoles.edit', [$userRoles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>