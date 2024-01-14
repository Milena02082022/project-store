@extends('layouts.app')

@section('page.title', "Оформлення замовлення")

@section('content')
    <section>
        <div class="container mt-5">
            <h3 class="title">Оформлення замовлення</h3>
            <div class="order-details">
                <h4>Інформація про замовлення</h4>
                <p><strong>Загальна сума:</strong> {{ $order->getTotalPrice() }} грн.</p>
            </div>
            <div class="order-items">
                <h4>Список товарів</h4>
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
                                <td>{{ $item->getTotalPrice() }} грн.</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="order-form">
                <h4>Інформація про замовлення</h4>
                <p><strong>Ім'я:</strong> {{ $order->name }}</p>
                <p><strong>Номер телефону:</strong> {{ $order->phone_number }}</p>
                <p><strong>Адреса доставки:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Спосіб доставки:</strong> {{ $order->postal_service }}</p>
                <p><strong>Спосіб оплати:</strong> {{ $order->payment_method }}</p>
            </div>
        </div>
    </section>
@endsection