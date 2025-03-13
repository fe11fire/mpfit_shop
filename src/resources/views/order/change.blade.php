@extends('layouts.app')
@section('content')
	<div class="row mt-3">
    @if ($order !== null) <h3>Редактирование заказа {{$order->title}}</h3> @else
		<h3>Создание заказа</h3>
    @endif
	</div>
  @php
  $count = (old('product_count') !== null) ? old('product_count') : (($order !== null) ? $order->product_count : 1); 
  $price = ($product !== null) ? $product->price : $order->product_price;
  @endphp
  
	<div class="row mt-3">
        <form @if ($order !== null) action="{{ route('order.update', $order->id)}}" @else action="{{ route('order.create', $product->slug) }}" @endif method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text">Ф.И.О.</span>
                <input type="text" name="fio" class="form-control" @if (old('fio') !== null)value="{{ old('fio') }}"@else @if ($order !== null) value="{{ $order->fio }}" @endif @endif >
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Комментарий</span>
                <textarea class="form-control" name="comment">@if (old('comment') !== null){{ old('comment') }}@else @if ($order !== null){{ $order->comment }}@endif @endif</textarea>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text">Товар (Наименование)</span>
                <input type="text" name="product_title" class="form-control" @if ($product !== null) value="{{ $product->title }}"@else @if ($order !== null) value="{{ $order->product_title }}" @endif @endif readonly>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Цена</span>
                <input type="number" step="0.01" min="0" name="product_price" class="form-control" value="{{ $price->value() }}" id="price" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Количество</span>
                <input type="number" step="1" min="1" class="form-control" name="product_count" value="{{ $count }}" onchange="changeSum()" id="count"> 
              </div>
              
              @if ($order !== null)
              <select class="form-select mb-3" name="status">
                <option selected>Статус</option>
                @foreach ($statuses as $status)
                  <option value="{{ $status->value }}" @if ((old('status') !== null) && (old('status') == $status->value)) selected @else @if (($order->status->value == $status->value)) selected @endif @endif>{{$status->caption()}}</option>
                @endforeach
              @endif
              </select>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Итого</span>
                <input type="number" id="sum" class="form-control" value="{{ $price->sum($count)->value() }}" disabled>
              </div>

              @if($errors->any())
                  {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
              @endif
              <button class="btn btn-outline-secondary mt-3" type="submit">@if ($order !== null) Изменить @else Создать @endif</button>
            @csrf
            @if ($order !== null)
            @method('PUT')
            @endif
            <a class="btn btn-outline-secondary mt-3" @if ($product !== null) href="{{route('product', $product->slug)}}" @else href="{{route('orders')}}" @endif> Отмена </a>
        </form>
    </div>

    <script>
      function changeSum(){
        let sum = document.getElementById('sum');
        sum.value = (document.getElementById('count').value * document.getElementById('price').value).toFixed(2);
      }
    </script>
 @endsection