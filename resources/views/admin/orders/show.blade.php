@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
				<h1 class="title">Деталі замовлення №{{ $order->id }}</h1>
				<p class="item-text"><strong>Ім`я замовника:</strong> {{ $order->name }}</p>
				<p class="item-text"><strong>Номер телефону замовника:</strong> {{ $order->phone_number }}</p>
				<p class="item-text"><strong>Адреса доставки:</strong> {{ $order->shipping_address }}</p>
				<p class="item-text"><strong>Статус замовлення:</strong> {{ $order->status }}</p>
				<p class="item-text"><strong>Спосіб оплати:</strong> {{ $order->payment_method}}</p>
				<p class="item-text"><strong>Дата створення:</strong> {{ $order->created_at->format('d.m.Y')}}</p>

				<h2 class="item-title">Замовлені товари:</h2>
					@foreach ($order->orderItems as $item)
						<p class="item-text"><strong>Назва товару: </strong>{{ $item->product->name }}</p>
						<p class="item-text"><strong>Кількість:</strong> {{ $item->count }}</p>
						<p class="item-text"><strong>Загальна сума:</strong> {{ $item->price }} грн.</p>
					@endforeach
			</div>
		</div>
	</div>
</section>
@endsection