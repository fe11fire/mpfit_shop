@extends('layouts.app')
@section('content')
	<div class="row mt-3">
		<h1>Заказы</h1>
	</div>
	<div class="row mt-3">
		<div class="list-group">
			@each('order.order', $orders, 'item')
		</div>
	</div>
@endsection