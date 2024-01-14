@extends('layouts.app')

@section('page.title', "Корзина")

@section('content')
<section>
    <div class="container mt-5">
        <h3 class="title">Корзина</h3>
        @if ($order && $order->orderItems->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Назва товару</th>
                        <th scope="col">Ціна</th>
                        <th scope="col">Кількість</th>
                        <th scope="col">Загальна сума</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td>
                            @if($item->product)
                                {{$item->product->name}}
                            @else
                                Товар не знайдено
                            @endif
                        </td>
                        <td>{{$item->price}}  грн.</td>
                        <td>
                            <div class="input-group">
                                <a href="{{ route('basket.decrease', ['itemId' => $item->id]) }}" class="btn btn-outline-secondary">-</a>
                                <input type="text" class="form-control" value="{{ $item->count }}" readonly>
                                <a href="{{ route('basket.increase', ['itemId' => $item->id]) }}" class="btn btn-outline-secondary">+</a>
                            </div>
                        </td>
                        <td>{{$item->getTotalPrice()}} грн.</td>
                        <td>
                            <a href="{{ route('basket.remove', ['itemId' => $item->id]) }}" class="btn btn-danger">Видалити</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <h5 class="me-3">Загальна сума: {{$order->getTotalPrice()}} грн.</h5>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="{{route('products')}}" class="btn btn-success">Додати товари в корзину</a>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('basket.place') }}" class="btn btn-primary">Оформити замовлення</a>
            </div>
        @else
            <h4 class="item-text">Корзина порожня</h4>
            <div class="d-flex justify-content-start mt-3">
                <a href="{{route('products')}}" class="btn btn-success">Додати товари в корзину</a>
            </div>
        @endif
    </div>
</section>
@endsection
