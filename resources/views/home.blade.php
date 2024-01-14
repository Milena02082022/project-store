@extends('layouts.auth')

@section('page.title', "Особистий кабінет користувача")

@section('content')
<section class="section2">
		<div class="container mt-4">
			<div class="row">
			  <div class="col-md-2">
				 <div class="list-group">
					<a href="{{route('user.profile')}}" class="list-group-item list-group-item-action">Профіль</a>
				 </div>
			  </div>
			  <div class="col-md-9">
				 <h3 class="title">Привіт, {{ Auth::user()->name }}!</h3>
                 <p class="item-text">Ви можете створити чи переглянути своє замовлення!</p>
			  </div>
			</div>
		</div>
</section>
@endsection
