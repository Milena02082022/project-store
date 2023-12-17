@extends('layouts.app')

@section('title-page', 'Адміністративна панель')

@section('content')
<section class="section2">
<div class="container">
	<div class="row">
		<div class="col-12 col-md-6">
			@yield('auth.content')
		</div>
	</div>
</div>
</section>
@endsection