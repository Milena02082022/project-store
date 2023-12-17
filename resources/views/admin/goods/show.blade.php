@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<button class="btn btn-light "><a href="" class="nav-link">Назад</a></button>
		<h3 class="title">Детальніше про товар {{ $product->name }}</h3>
	</div>
</section>
@endsection