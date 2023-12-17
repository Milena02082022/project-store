@extends('layouts.app')

@section('page.title', "Категорії")

@section('content')
<section>
	<div class="container mt-5">
		<h2>Корзина</h2>
		
		<!-- Таблиця з товарами в корзині -->
		<table class="table">
			 <thead>
				  <tr>
						<th scope="col">Назва товару</th>
						<th scope="col">Ціна</th>
						<th scope="col">Кількість</th>
						<th scope="col">Загальна сума</th>
						<th scope="col"></th>
				  </tr>
			 </thead>
			 <tbody>
				  <!-- Приклад рядка з товаром -->
				  <tr>
						<td>Смартфон Apple iPhone 13 </td>
						<td>31999 грн</td>
						<td>1</td>
						<td>31999 грн</td>
						<td><button class="btn btn-danger btn-sm">Видалити</button></td>
				  </tr>
				  <tr>
					<td>Планшет Samsung Galaxy Tab S6 Lite 10.4'' 64Gb Grey </td>
					<td>11699 грн.</td>
					<td>1</td>
					<td>11699 грн.</td>
					<td><button class="btn btn-danger btn-sm">Видалити</button></td>
			  </tr>
			 </tbody>
		</table>
	
		<!-- Загальна сума -->
		<div class="d-flex justify-content-end">
			 <h5 class="me-3">Загальна сума: 43698 грн.</h5>
		</div>
	
		<!-- Кнопка для переходу до оформлення замовлення -->
		<div class="d-flex justify-content-end mt-3">
			 <a href="#" class="btn btn-primary">Оформити замовлення</a>
		</div>
	</div>
</section>

@endsection
