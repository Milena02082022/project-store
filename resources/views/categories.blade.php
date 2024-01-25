@extends('layouts.app')

@section('page.title', "Категорії")

@section('content')
<section class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><img src="{{asset('images/home.svg')}}" alt="home"></a></li>
		  <li class="breadcrumb-item active" aria-current="page">Категорії товарів</li>
		</ol>
	 </nav>
	<h2 class="title mt-4">Категорії товарів</h2>
	<div class="row">
		@foreach($categories as $category)
			@include('includes.card-category')
		@endforeach
	</div>
</section>
@endsection
