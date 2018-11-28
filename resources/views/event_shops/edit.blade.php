@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Event Shop
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventShop, ['route' => ['eventshops.update', $eventShop->id], 'method' => 'patch']) !!}

                        @include('event_shops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection