@extends('layouts.app')

@section('page.title', "Контакти")

@section('content')
<section class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><img src="{{asset('images/home.svg')}}" alt="home"></a></li>
		  <li class="breadcrumb-item active" aria-current="page">Контакти</li>
		</ol>
	 </nav>
	<div class="d-flex flex-column">
		<h2 class="title mb-4">Контакти</h2>
		<div class="item">
			<p class="item-text">Багатоканальний телефон гарячої лінії , щодня з <span class="grafic">8:00</span> до <span class="grafic">21:00</span></p>
			<p class="item-text">Дзвінки з мобільних і стаціонарних телефонів в межах України безкоштовні</p>
		</div>
		<div class="item">
			<h3 class="item-title mb-4">Наші контакти:</h3>
			<p class="item-text">Телефон: <span class="phone">0-800-303-505</span></p>
			<p class="item-text">Електронна пошта:  <span class="email">info@store.ua</span></p>
		</div>
		<div>
			<p class="item-text">Якщо у вас є скарги, пропозиції або коментарі щодо роботи магазинів <span class="name">Store</span> - обов'язково повідомте нас про це по телефону!</p>
		</div>
	</div>
</section>
@endsection
