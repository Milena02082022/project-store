@extends('layouts.auth')

@section('page.title', "Профіль користувача")

@section('content')
<section class="section2">
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group">
					  <button class="btn btn-light "><a href="{{route('user.home')}}" class="nav-link">Назад</a></button>
					</div>
				 </div>
				 <div class="col-md-9">
					<h3 class="title">Профіль користувача</h3>
					<p class="item-text"> Ім`я: 
						<span class="name"> {{ Auth::user()->name }}</span>
					</p>
					<p class="item-text">Електронна пошта: 
						<span class="name">{{ Auth::user()->email }}</span>
					</p>
					<p class="item-text">Роль: 
						<span class="name">{{ Auth::user()->isAdmin() ? 'Адміністратор' : 'Користувач' }}</span>
					</p>
					<p class="item-text">Дата реєстрації: 
						<span class="name">{{ Auth::user()->created_at->format('d.m.Y') }}</span>
					</p>		 
				</div>
			</div>
		</div>
</section>
@endsection
