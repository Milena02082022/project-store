@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
		<h3 class="title">Редагувати категорію</h3>
		<form method="POST" action="{{ route('classes.update', $oldCategory->id) }}">
			@csrf
			@method('PUT')
			<div class="form-group pb-2">
				<label for="name">Назва категорії:</label>
				<input type="text" name="old_category_name" value="{{ $oldCategory->name }}" class="form-control" readonly>
			</div>
			<div class="form-group pb-2">
				<label for="name">Назва зміненої категорії:</label>
				<input type="text" name="new_category_name" value="{{ $newCategoryName }}" class="form-control">
		</div>
			<button type="submit" class="btn btn-primary">Оновити</button>
		</form>
	</div>
</section>
@endsection