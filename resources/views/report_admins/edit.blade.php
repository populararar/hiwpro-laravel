@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="font-family:'Kanit';">
            Report Admin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reportAdmin, ['route' => ['reportAdmins.update', $reportAdmin->id], 'method' => 'patch']) !!}

                        @include('report_admins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection