@extends('layouts.auth')

@section('page.title', "Адміністративна панель")

@section('content')
<section class="section2">
		 <!-- Вміст кабінету -->
		<div class="container mt-4">
			<div class="row">
			  <div class="col-md-3">
				 <div class="list-group">
					<a href="{{route('goods.index')}}" class="list-group-item list-group-item-action">Товари</a>
					<a href="{{route('classes.index')}}" class="list-group-item list-group-item-action">Категорії</a>
					<a href="{{route('orders.index')}}" class="list-group-item list-group-item-action">Замовлення</a>
				 </div>
			  </div>
			  <div class="col-md-9">
				 <h3 class="title">Ласкаво просимо до адміністративної панелі!</h3>
				 <p class="item-text">Виберіть категорію в панелі навігації, щоб внести зміни на сайті інтернет-магазину "Store"</p>
			  </div>
			</div>
		</div>
</section>
@endsection
