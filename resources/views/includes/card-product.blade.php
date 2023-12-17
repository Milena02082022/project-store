<div class="product-container">
	<h4 class="product-title">{{$product->name}}</h4>
	<img class="img-product" src="{{asset('images/smartphones/xiaomi-redmi-note-12s.jpg')}}" alt="xiaomi-redmi-note-12s">
	<p class="product-text"><br> {{$product->description}}</p>
	<p class="product-price" >Ціна: {{$product->price}} грн. </p>
	<form action="{{route('basket-add', $product->id)}}" method="POST">
		@csrf
		<button class="btn btn-green" type="submit" id="addToCartBtn" role="button">Додати в корзину</button>
		<a href="{{route('product',[$product->category->code, $product->code])}}" class="btn btn-blue" role="button">Детальніше</a>
	</form>
</div>