@extends('layouts.app')
@section('content')
	<div class="row mt-3">
		<h1>Каталог товаров</h1>
	</div>
	<div class="row row-cols-2 row-cols-md-4 g-4 mt-3">
		@each('catalog.product', $products, 'item')
	</div>
@endsection