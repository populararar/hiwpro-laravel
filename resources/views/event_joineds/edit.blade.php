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
                   
                    @include('event_joineds.fields')

               </div>
           </div>
       </div>
   </div>
@endsection