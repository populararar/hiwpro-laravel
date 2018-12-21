<table class="table table-responsive" id="events-table">
    <thead>
        <tr>
            <th width="50%">Eventname</th>
            <th>Startdate</th>
            <th>Lastdate</th>
            <th>Image</th>
            <th colspan="3">Action</th>
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