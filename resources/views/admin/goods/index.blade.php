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
				<h1 class="title pt-4">Товари інтернет-магазину Store</h1>
			  <table class="table table-striped">
				<thead>
					 <tr>
						  <th>№</th>
						  <th>Назва</th>
						  <th>Дії</th>
					 </tr>
				</thead>
				<tbody>
					 @foreach($products as $product)
						  <tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>
									 <a href="" class="btn btn-primary">Редагувати</a>
									 <form action="" method="POST" style="display: inline;">
										  @csrf
										  @method('DELETE')
										  <button type="submit" class="btn btn-danger">Видалити</button>
									 </form>
								</td>
						  </tr>
					 @endforeach
				</tbody>
			</table>
			<a href="" class="btn btn-success">Створити новий товар</a>
			</div>
		</div>
	</div>
</section>
@endsection