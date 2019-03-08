@extends('layouts.hiwpro')

@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> --}}

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.details{
	text-align: center;
}
.card-comment{
	padding: 2.5%;
	border: 1px solid #ccc;
	margin-top: 2%; 
}
</style>

<main>
 
	<div class="details">
		{{-- {{dd($avgData)}} --}}
		@if(empty($profile->img))
		<img class="materialboxed responsive-img" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
		@else
		<img class="materialboxed responsive-img" width="150px" src="{{ asset('storage'.$profile->img)}}">
		@endif
		
		<h3>{{$avgData->seller->name}}</h3>
		<p>Actor / นักหิ้วมือโปร</p>
	</div>
	<div class="container bio">
			<div class="title">
				<h6>รายละเอียดงานถนัด</h6>
			</div>
			<div class="content">
				@if(empty($profile->intro))
				<img class="materialboxed responsive-img" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
				@else
				<p>{{$profile->intro}}</p>
				@endif
				
			</div>
			<hr />
	</div>

	<div class="container posts">
		<div class="title">
			<h6>Comment</h6>
		</div>

		@foreach ($reviews as $item)
			<div class=" card card-comment col-12">
				<div class="row">
					<div class="col-sm-1">
							@if ($item->customer)
								<img class="materialboxed responsive-img" src="{{ asset('storage'.$item->customer->img)}}">
							@else
							<img class="materialboxed responsive-img" style="float:left;" width="80px" src="https://sv1.picz.in.th/images/2019/02/11/TlwilW.png"> 
							@endif
					</div>
					<div class="col-sm-8">
						<h5>{{$item->user->name}}</h5>	
					<p>{{$item->comment}}</p>
					<p class="card-text" style="color: #df3433" > 
						@if ($item->score == 0)
						ยังไม่มีคะแนน
						@elseif($item->score > 0 && $item->score < 0.5)
						<i class="fas fa-star-half-alt"></i>
						@elseif($item->score >= 0.5 && $item->score <= 1)
						<i class="fas fa-star"></i>
						@elseif($item->score > 1 && $item->score <= 1.5)
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
						@elseif($item->score > 1.5 && $item->score <= 2)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						@elseif($item->score > 2 && $item->score <= 2.5)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
						@elseif($item->score > 2.5 && $item->score <= 3)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						@elseif($item->score >= 3 && $item->score <= 3.5)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
						@elseif($item->score >= 3.5 && $item->score <= 4)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						@elseif($item->score >= 4 && $item->score <= 4.5)
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
						@else
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						@endif 
					</p> 
				</div>
				<div class="col-sm-3">
					@if ($item->img != null)
						<img class="materialboxed responsive-img" style="float:left;" width="80px" src="{{ asset('storage'.$item->img)}}">
					@endif
					@if ($item->img2 != null)
						<img class="materialboxed responsive-img" style="float:left;" width="80px" src="{{ asset('storage'.$item->img2)}}">
					@endif
				</div>
				</div>
			
			</div>	
@endforeach

</main>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
{{-- {{dd($reviews, $avgData, $avgData->seller->name)}} --}}
<script>
(function($) {
	
	$(window).scroll(function() {
		
		$(window).scroll(function() {
			space = $(window).innerHeight() - $('.fab').offsetTop + $('.fab').offsetHeight;
			if(space < 200){
				$('.fab').css('margin-bottom', '150px');
			}
		})
		
	});
	
})(jQuery);
</script>
@endsection