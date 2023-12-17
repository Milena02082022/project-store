@extends('layouts.app')
@section('page.title', "Товари")

@section('content')
<section class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><img src="{{asset('images/home.svg')}}" alt="home"></a></li>
		  <li class="breadcrumb-item active" aria-current="page">Наші товари</li>
		</ol>
	 </nav>
	 <h2 class="title mt-4">Наші товари</h2>
	<div class="row">
		@foreach($products as $product)
			@include('includes.card-product')
		@endforeach
	</div>
</section>
@endsection