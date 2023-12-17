@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
				<h1 class="title pt-4">Замовлення № {{$order->id}}</h1>
			  	<p>Тут відображаються деталі замовлення користувача</p>
			</div>
		</div>
	</div>
</section>
@endsection