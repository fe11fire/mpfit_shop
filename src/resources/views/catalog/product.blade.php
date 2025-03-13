<div class="col">
<div class="card" style="width: 18rem;">
	<div class="card-body">
	  <h5 class="card-title">{{ $item->title }}</h5>
	  <h6 class="card-subtitle mb-2 text-info fw-bold">{{ $item->price }}</h6>
	  <p class="card-text">{{ $item->description }}</p>
	  <a href="{{ route('product', $item->slug) }}" class="card-link">Подробнее</a>
	</div>
</div>
</div>