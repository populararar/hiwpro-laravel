<table class="table table-responsive" id="events-table">
    <thead>
        <tr> 
            <th></th>
            <th>ชื่ออีเว้นต์</th>
            <th>วันเริ่มงาน</th>
            <th>วันสิ้นสุดงาน</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr> 
            <td><img  src="{{ asset('/storage/'.$event->imgPath) }}" alt="" width="200"></td>
            <td>{!! $event->eventName !!}</td>
            <td>{!! $event->startDate !!}</td>
            <td>{!! $event->lastDate !!}</td>
            <!-- Imgpath Field -->
            <td>

                <div class='btn-group'>
                    <a href="{!! route('eventJoineds.show', [$event->event_id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventJoineds.edit', [$event->event_id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-edit"></i></a>

                </div>
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