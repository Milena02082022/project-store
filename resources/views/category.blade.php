@extends('layouts.app')

@section('page.title', "Категорія")

@section('content')
<section class="section2">
	<div class="container mt-4">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><img src="{{asset('images/home.svg')}}" alt="home"></a></li>
			  <li class="breadcrumb-item"><a href="{{ route('categories') }}">Категорії товарів </a></li>
			  <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
			</ol>
		 </nav>
		<h3 class="title mt-4">{{$category->name}} <span class="number">{{$category->products->count()}}</span></h3>
		<div class="row">
			@foreach($category->products as $product)
				@include('includes.card-product', compact('product'))
			@endforeach
		</div>
	</div>
</section>
@endsection
