@extends('layouts.app')

@section('page.title', "Сторінка товару")

@section('content')
<section class="section2">
	<div class="container">
		<div class="product-container">
			<h4 class="product-title">{{$product->name}}</h4>
			<img class="img-product" src="{{asset('images/smartphones/xiaomi-redmi-note-12s.jpg')}}" alt="xiaomi-redmi-note-12s">
			<p class="product-text">{{$product->description}}</p>
			<p class="product-price" >Ціна: {{$product->price}} грн. </p>
			<form action="{{route('basket-add', $product->id)}}" method="POST">
				@csrf
				<button class="btn btn-green" type="submit" id="addToCartBtn" role="button">Додати в корзину</button>
			</form>
		</div>
	</div>
</section>
@endsection
