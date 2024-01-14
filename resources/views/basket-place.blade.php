@extends('layouts.app')

@section('page.title', "Оформлення замовлення")

@section('content')
    <section>
        <div class="container mt-5">
            <h3 class="title">Оформлення замовлення</h3>
            <div class="order-items">
					<h3 class="item-title">Інформація про замовлення</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Назва товару</th>
                            <th scope="col">Ціна</th>
                            <th scope="col">Кількість</th>
                            <th scope="col">Загальна сума</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>
                                    @if($item->product)
                                        {{ $item->product->name }}
                                    @else
                                        Товар не знайдено
                                    @endif
                                </td>
                                <td>{{ $item->price }} грн</td>
                                <td>{{ $item->count }}</td>
                                <td>{{ $item->getTotalPrice() }} грн</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
					 <div class="d-flex justify-content-end">
						<h5 class="item-text">Загальна сума: {{$order->getTotalPrice()}} грн.</h5>
				  </div>
            </div>
            <div class="order-form">
                <h4 class="item-title">Форма оформлення замовлення</h4>
                <form method="post" action="{{ route('place.order') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
						  <div class="mb-3">
								<label for="shipping_address" class="form-label">Номер телефону</label>
								<input type="text" class="form-control" id="phone_number" name="phone_number" required>
					  		</div>
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Адреса доставки</label>
                        <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
                    </div>
                    <div class="mb-3">
							<label for="postal_service" class="form-label">Спосіб доставки</label>
							<select class="form-select" id="postal_service" name="postal_service" required>
								<option value="nova_poshta">Нова пошта</option>
								<option value="ukrposhta">Укрпошта</option>
							</select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Спосіб оплати</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="card">Карткою</option>
                            <option value="cash">Готівкою</option>
                        </select>
                    </div>
						  <div class="mb-3">
							<label for="total_amount" class="form-label">Загальна сума замовлення</label>
							<input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ $order->getTotalPrice() }} грн." readonly>
					  </div>
                    <button type="submit" class="btn btn-primary">Оформити замовлення</button>
                </form>
            </div>
        </div>
    </section>
@endsection