@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
		<h3 class="title">Редагувати категорію</h3>
		<form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
			@csrf
			@method('PUT')
			<div class="form-group pb-2">
				 <label for="old_category_name">Назва категорії:</label>
				 <input type="text" id="old_category_name" name="old_category_name" value="{{ $category->name }}" class="form-control" readonly>
			</div>

			<div class="form-group pb-2">
				 <label for="new_category_name">Нова назва категорії:</label>
				 <input type="text" id="new_category_name" name="new_category_name" value="" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Оновити</button>
		</form>
	</div>
</section>
@endsection