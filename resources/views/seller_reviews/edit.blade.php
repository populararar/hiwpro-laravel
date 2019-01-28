@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seller Review
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sellerReview, ['route' => ['sellerReviews.update', $sellerReview->id], 'method' => 'patch']) !!}

                        @include('seller_reviews.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection