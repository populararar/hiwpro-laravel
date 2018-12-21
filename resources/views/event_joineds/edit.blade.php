@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Event Joined
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    <form action="{{ route('eventJoineds.update', [ 'eventJoined' =>  $event->event_id]) }}" method="post">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                    @include('event_joineds.fields')

                    </form>
               </div>
           </div>
       </div>
   </div>
@endsection