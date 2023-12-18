@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<h3 class="title">Створити новий товар</h3>
        <form method="POST" action="{{ route('goods.store') }}">
            @csrf
            <div class="form-group pb-2">
                <label for="name">Назва товару:</label>
                <input type="text" name="name" class="form-control">
            </div>
				<div class="form-group pb-2">
					<label for="name">Код категорії:</label>
					<input type="text" name="name" class="form-control">
			  </div>
				<div class="form-group pb-2">
					<label for="name">Код товару:</label>
					<input type="text" name="name" class="form-control">
			  </div>
			  <div class="form-group pb-2">
					<label for="name">Опис товару:</label>
					<input type="text" name="name" class="form-control">
		  		</div>
				<div class="form-group pb-2">
					<label for="name">Ціна товару:</label>
					<input type="text" name="name" class="form-control">
		  		</div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
	</div>
</section>
@endsection