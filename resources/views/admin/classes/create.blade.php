@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<h3 class="title">Створити нову категорію</h3>
        <form method="POST" action="{{ route('classes.store') }}">
            @csrf
            <div class="form-group pb-2">
                <label for="name">Назва категорії:</label>
                <input type="text" name="name" class="form-control">
            </div>
				<div class="form-group pb-2">
					<label for="code">Код категорії:</label>
					<input type="text" name="code" class="form-control">
			  </div>
			  <div class="form-group pb-2">
					<label for="description">Опис категорії:</label>
					<input type="text" name="description" class="form-control">
		  		</div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
	</div>
</section>
@endsection