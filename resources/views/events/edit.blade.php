@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Event
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($event, ['route' => ['events.update', $event->event_id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('events.fields_update')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection