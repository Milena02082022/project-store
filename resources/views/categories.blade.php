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
		<div class="col-md-4 mb-4 mr-3">
			<div class="card category-card">
				<div class="card-body">
					 <img src="{{asset('images/category_01.jpg')}}" class="card-img-top" alt="Смартфони">
					 <h5 class="card-title category-title">{{$category->name}}</h5>
					 <a href="{{$category->code}}" class="btn btn-steal-blue">Перейти</a>
				</div> 
		  </div>
		</div>
		@endforeach
	</div>
</section>
@endsection
