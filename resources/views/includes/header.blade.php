<header class="header fixed-top">
	<nav class="navbar navbar-expand-md">
		<div class="container">
			 <a class="navbar-brand" href="{{ route('welcome') }}">
				  {{ config('app.name') }}
			 </a>
			 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				  <span class="navbar-toggler-icon"></span>
			 </button>
	
			 <div class="collapse navbar-collapse" id="navbarSupportedContent">
				  <!-- Left Side Of Navbar -->
				  <ul class="navbar-nav me-auto">
						<li class="nav-item">
							 <a class="nav-link" href="{{ route('products') }}">{{ __('Всі товари') }}</a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="{{ route('categories') }}">{{ __('Категорії') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contacts') }}">{{ __('Наші контакти') }}</a>
					  </li>
						<li class="nav-item">
							 <a class="nav-link" href="{{url('/basket')}}">{{ __('В корзину') }}</a>
						</li>
				  </ul>
	
				  <!-- Right Side Of Navbar -->
				  <ul class="navbar-nav ms-auto">
					@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Увійти') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Зареєструватися') }}</a>
						</li>
					@else
						@if(Auth::user()->isAdmin())
							<li class="nav-item">
									<a class="nav-link" href="{{ route('admin.home') }}">{{ __('Панель адміністратора') }}</a>
							</li>
						@else
							<li class="nav-item">
								<a class="nav-link" href="{{ route('home') }}">{{ __('Особистий кабінет') }}</a>
							</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Вийти') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
							</form>
						</li>
					@endguest
				  	</ul>
			 </div>
		</div>
	</nav>
</header>
