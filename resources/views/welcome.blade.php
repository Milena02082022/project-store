@extends('layouts.app')

@section('page.title', "Головна")

@section('content')
    <section class="section">
        <div class="container-fluid mb-4">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('images/baner01.jpg')}}" class="d-block w-100" alt="baner01">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/baner02.jpg')}}" class="d-block w-100" alt="baner02">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/baner03.jpg')}}" class="d-block w-100" alt="baner03">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>
    <section class="section1">
        <div class="container mb-4">
            <h2 class="title mb-4">Категорії товарів</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_01.jpg')}}" class="card-img-top" alt="Смартфони">
                            <h5 class="card-title category-title">Смартфони</h5>
                            <a href="{{url('/smartphones')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_02.jpg')}}" class="card-img-top" alt="Ноутбуки">
                            <h5 class="card-title category-title">Ноутбуки</h5>
                            <a href="{{url('/laptops')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_03.jpg')}}" class="card-img-top" alt="Навушники">
                            <h5 class="card-title category-title">Навушники</h5>
                            <a href="{{url('/earphones')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_04.jpg')}}" class="card-img-top" alt="Смарт-годинники">
                            <h5 class="card-title category-title">Смарт-годинники</h5>
                            <a href="{{url('/smart-watches')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_05.jpg')}}" class="card-img-top" alt="Планшети">
                            <h5 class="card-title category-title">Планшети</h5>
                            <a href="{{url('/tablets')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_06.jpg')}}" class="card-img-top" alt="Техніка для дому">
                            <h5 class="card-title category-title">Техніка для дому</h5>
                            <a href="{{url('/household-appliances')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_07.jpg')}}" class="card-img-top" alt="Аксесуари для смартфонів">
                            <h5 class="card-title category-title">Аксесуари для смартфонів</h5>
                            <a href="{{url('/phone-accessories')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_08.jpg')}}" class="card-img-top" alt="Техніка для кухні">
                            <h5 class="card-title category-title">Техніка для кухні</h5>
                            <a href="{{url('/kitchen-appliances')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="{{asset('images/category_09.png')}}" class="card-img-top" alt="Техніка для догляду та краси">
                            <h5 class="card-title category-title">Техніка для догляду та краси</h5>
                            <a href="{{url('/beauty-equipment')}}" class="btn btn-steal-blue">Перейти</a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container mb-4">
            <h2 class="title mb-4">Найпоширеніші товари</h2>
            <div class="row"> 
                @foreach($products as $product)
			        @include('includes.card-product')
		        @endforeach
            </div>
        </div>
    </section>
    <section class="section1">
        <div class="container mb-5">
            <h2 class="title mb-4">Відгуки користувачів</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Юлія</h3>
                            <p class="card-text">Я задоволена що обрала ваш інтернет-магазин. Дякую за швидкість та якість.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Олег</h3>
                            <p class="card-text">Мододці!!! Так тримати! Усе швидко, якісно та зручно.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Богдан</h3>
                            <p class="card-text">Замовляв безпровідні навушники на подарунок, швидко зв'язалися уточнили інформацію, відзразу відправили товар.</p>
                            <p class="card-text">Через два дні отримав своє замовлення. Інтернет-магазин рекомендую!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Ірина</h3>
                            <p class="card-text">Замовляла смарт-годинник Apple, менеджер магазину швидко зв'язався зі мною.</p>
                            <p class="card-text">Товаром задоволена, смарт-годинник є дуже стильним, зручний та багатофункціональний.Щиро дякую!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container mt-4">
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
        </div>
    </section>
    {{-- @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Увійти</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Зареєструватися</a>
                @endif
            @endauth
        </div>
    @endif --}}
@endsection
