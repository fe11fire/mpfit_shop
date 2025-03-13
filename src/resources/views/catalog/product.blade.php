<div class="col">
<div class="card" style="width: 18rem;">
	<div class="card-body">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="card-title">{{ $item->title }}</h5>
			<small> {{$item->category->title}}</small>
		  </div>
	  
	  <h6 class="card-subtitle mb-2 text-info fw-bold">{{ $item->price }}</h6>
	  <p class="card-text">{{ $item->description }}</p>
	  <a href="{{ route('product', $item->slug) }}" class="card-link">Подробнее</a>

	  <div class="row">
		<form class="ms-auto col-auto"  action="{{ route('order.change.new', $item->slug) }}" method="GET">
			<button class="btn btn-outline-secondary mt-3" type="submit" title="Создать заказ"><i class="bi bi-cart-plus"></i></button>
		</form>
		<form class="col-auto" action="{{ route('product.change.update', $item->slug) }}" method="GET">
			<button class="btn btn-outline-secondary mt-3" type="submit" title="Редактировать"><i class="bi bi-pencil-square"></i></button>
		</form>
		<form class="col-auto" action="{{ route('product.delete', $item->slug) }}" method="POST">
			<button class="btn btn-outline-secondary mt-3" type="submit" title="Удалить"><i class="bi bi-trash"></i></button>
			@method('DELETE')
			@csrf
		</form>
	  </div>
	  
	</div>
</div>
</div>