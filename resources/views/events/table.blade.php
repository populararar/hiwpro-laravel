<table class="table table-responsive" id="events-table">
    <thead>
        <tr>
        <th style="width:25%;">Eventname</th>
        <th>Startdate</th>
        <th>Lastdate</th>
        <th>Image</th>
        <th>Type</th>
        <th>Exp</th>
        <th>Income</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{!! $event->eventName !!}</td>
            <td>{!! $event->startDate !!}</td>
            <td>{!! $event->lastDate !!}</td>
            <td><img src="{{ asset('/storage/'.$event->imgPath) }}" alt="" width="50"></td>
            <!-- Imgpath Field -->
            <td>{!! $event->event_type !!}</td>
            <td>{!! $event->event_exp !!}</td>
          
            <td>{!! $event->income !!}</td>
            <td>
                {!! Form::open(['route' => ['events.destroy', $event->event_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('events.show', [$event->event_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-folder-open"></i></a>
                    <a href="{!! route('events.edit', [$event->event_id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
    $('#events-table').DataTable();
} );
    </script>
@endsection