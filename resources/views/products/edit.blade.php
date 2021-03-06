@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['products.update', $product->product_id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('products.fields_update',['shop'=>$shop,'categories'=>$categories])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection