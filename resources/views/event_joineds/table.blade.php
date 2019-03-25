<table class="table table-responsive" id="eventJoint-table">
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
            <td>{!! $event->start_date !!}</td>
            <td>{!! $event->last_date !!}</td>
            <!-- Imgpath Field -->
            <td>

                <div class='btn-group'>
                    <a href="{!! route('eventJoineds.show', [$event->event_id]) !!}" class='btn btn-secondary '>
                        ดูรายละเอียด </a><br>
                    <a href="{!! route('eventJoineds.edit', [$event->event_id]) !!}" class='btn btn-danger'>
                        รับออร์เดอร์</a>

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
    $(document).ready( function () {
    $('#eventJoint-table').DataTable();
} );
    </script>
@endsection