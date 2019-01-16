<!-- Seller Seller Id Field -->
<!-- Event Id Field -->
<div class="col-sm-12" style="padding-left: 20px">
    @include('event_joineds.show_fields')
</div>


<div class="col-sm-12">
    <form action="{{ route('eventJoineds.update', [ 'eventJoined' =>  $event->event_id]) }}" method="post">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        @foreach ($eventShops as $eventShop)
            @if( !$eventShop->joined )
            <div class="form-group col-sm-12">
                {!! Form::label('event_shop_id', 'Event Shop Id:') !!}
                {!! Form::checkbox('shop_id[]', $eventShop->id , null) !!}
                {!! $eventShop->shop->name !!}
            </div>
            @endif

        @endforeach
        <!-- Submit Field -->
        @if( $count > 0 )
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('eventJoineds.index') !!}" class="btn btn-default">Cancel</a>
        </div>
        @endif
    </form>
    @if( $countUnjoin > 0 )
    <hr>
    <h3>Unjoin</h3>
    @endif
    @foreach ($eventShops as $eventShop)
        @if( $eventShop->joined)
            {!! Form::open(['route' => ['eventJoineds.destroy',$eventShop->joined_id ], 'method' => 'delete']) !!}
            <div class="row">
                <div class="col-md-2"><div class="form-group col-sm-12">{!! $eventShop->shop->name !!}</div></div>
                <div class="col-md-10"><button type="submit">Unjoin</button></div>
            </div>
            
            
            
            {!! Form::close() !!}
        @endif
    @endforeach

</div>
<!-- Event Shop Id Field -->


