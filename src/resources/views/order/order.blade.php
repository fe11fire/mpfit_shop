<a href="{{route('order.change.update', $item->id)}}" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Заказ №{{$item->id}}</h5><small class="fs-5">({{$item->status->caption()}})</small>
      <small> {{$item->created_at}}</small>
    </div>
    <p class="mt-1 mb-0">{{$item->fio}}</p>
    @if ($item->comment !== null)
	<small class="mt-2">{{$item->comment}}</small>
	@endif

	@if ($item->product === null)
		<p class="mt-3 mb-0">{{$item->product_title}} <span class="fs-6">(товар отсутствует)</span></p>
	@else
	
		<p class="mt-3 mb-0 p-1">{{$item->product_title}}</p><form action="{{ route('product', $item->product->slug) }}" method="GET">
			<button class="btn btn-outline-secondary" type="submit">Перейти к товару</button>
		</form>
	@endif
	
	<div class="d-flex w-100 justify-content-between mt-3">
		<h6>{{$item->product_price}} X {{$item->product_count}}</h6>
		<h6>Сумма заказа: {{$item->product_price->sum($item->product_count)}}</h6>
	</div>
  </a>