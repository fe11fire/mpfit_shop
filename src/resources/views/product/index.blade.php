@extends('layouts.app')

@section('title', $product->title)
@section('content')

	<div class="row mt-3">
		<h3>{{ $product->title }}</h3>
	</div>
	<div class="row mt-3">
		<p class="fw-bold">Описание</p>
		<p class="mt-2">{{ $product->description }}</p>
	</div>
	<div class="row mt-3">
		<h6 class="card-subtitle mb-2 text-info fw-bold">{{ $product->price }}</h6>
	</div>	
	<form action="{{ route('product.delete', $product->slug) }}" method="POST">
		<button class="btn btn-outline-secondary mt-3" type="submit">УДАЛИТЬ</button>
		@method('DELETE')
		@csrf
	</form>
	<form action="{{ route('product.change.update', $product->slug) }}" method="GET">
		<button class="btn btn-outline-secondary mt-3" type="submit">ИЗМЕНИТЬ</button>
	</form>
 @endsection