@extends('layouts.app')

@section('content')
<section class="section2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<button class="btn btn-light "><a href="{{url('/admin')}}" class="nav-link">Назад</a></button>
				<h2 class="title">Список замовлень</h2>
					<table class="table table-striped">
					<thead>
						 <tr>
							  <th>№</th>
							  <th>Id користувача</th>
							  <th>Статус</th>
							  <th>Дата створення</th>
							  <th>Дії</th>
						 </tr>
					</thead>
					<tbody>
						 @foreach ($orders as $order)
							  <tr>
									<td>{{ $order->id }}</td>
									<td>{{ $order->user_id }}</td>
									<td>{{ $order->status }}</td>
									<td>{{ $order->created_at }}</td>
									<td>
										<button class="btn btn-info">
											<a class="nav-link" href="{{ route('orders.show', $order) }}">Деталі</a>
										</button>
									</td>
							  </tr>
						 @endforeach
					</tbody>
			  </table>
				
			</div>
		</div>
	</div>
</section>
@endsection