@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<h3 class="title">Створити новий товар</h3>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group pb-2">
                <label for="name">Назва товару:</label>
                <input type="text" name="name" class="form-control">
            </div>
				<div class="form-group pb-2">
					<label for="category">Категорія:</label>
					<select name="category" id="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
			  </div>
				<div class="form-group pb-2">
					<label for="code">Код товару:</label>
					<input type="text" name="code" class="form-control">
			  </div>
			  <div class="form-group pb-2">
					<label for="descriotion">Опис товару:</label>
					<input type="text" name="description" class="form-control">
		  		</div>
				<div class="form-group pb-2">
					<label for="price">Ціна товару:</label>
					<input type="text" name="price" class="form-control">
		  		</div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
	</div>
</section>
@endsection