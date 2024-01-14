@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
				<h3 class="title pt-4">Детальніше про товар {{ $product->name }}</h3>
				<p class="item-text">Назва товару: <span class="name">{{ $product->name }}</span></p>
				<p class="item-text">Категорія товару: <span class="name">{{ $product->category_id }}</span></p>
				<p class="item-text">Опис товару: <span class="name">{{ $product->description }}</span></p>
				<p class="item-text">Ціна товару: <span class="name">{{ $product->price }} грн.</span></p>
			</div>
		</div>
	</div>
</section>
@endsection