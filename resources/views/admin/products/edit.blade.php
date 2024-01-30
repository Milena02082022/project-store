@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
		<h3 class="title">Редагувати товар</h3>
		<form method="POST" action="{{ route('products.update', $product->id) }}">
			@csrf
			@method('PUT')
			<div class="form-group pb-2">
				<label for="name">Назва товару:</label>
				<input type="text" name="old_product_name" value="{{ $product->name }}" class="form-control" readonly>
			</div>
			<div class="form-group pb-2">
				<label for="name">Назва зміненого товару:</label>
				<input type="text" name="new_product_name" value="" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Оновити</button>
		</form>
	</div>
</section>
@endsection