@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				@if (session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
				@if (session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif
				<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
				<h1 class="title pt-4">Категорії інтернет-магазину Store</h1>
			  <table class="table table-striped">
				<thead>
					 <tr>
						  <th>№</th>
						  <th>Назва</th>
						  <th>Дії</th>
					 </tr>
				</thead>
				<tbody>
					 @foreach($categories as $category)
						  <tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>
									 <a href="{{ route('classes.edit', $category->id) }}" class="btn btn-primary">Редагувати</a>
									 <form action="{{route('classes.destroy', $category->id)}}" method="POST" style="display: inline;">
										  @csrf
										  @method('DELETE')
										  <button type="submit" class="btn btn-danger">Видалити</button>
									 </form>
								</td>
						  </tr>
					 @endforeach
				</tbody>
			</table>
			<a href="{{ route('classes.create') }}" class="btn btn-success">Створити нову категорію</a>
			</div>
		</div>
	</div>
</section>
@endsection