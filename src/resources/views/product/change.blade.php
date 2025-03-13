@extends('layouts.app')
@section('content')
	<div class="row mt-3">
    @if ($product !== null) <h3>Редактирование товара {{$product->title}}</h3> @else
		<h3>Добавление товара</h3>
    @endif
	</div>
	<div class="row mt-3">
        <form @if ($product !== null) action="{{ route('product.update', $product->slug)}}" @else action="{{ route('product.create') }}" @endif method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text">Название</span>
                <input type="text" name="title" class="form-control" @if (old('title') !== null)value="{{ old('title') }}"@else @if ($product !== null) value="{{ $product->title }}" @endif @endif >
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Описание</span>
                <textarea class="form-control" name="description">@if (old('description') !== null){{ old('description') }}@else @if ($product !== null){{ $product->description }}@endif @endif</textarea>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Цена</span>
                <input type="number" step="0.01" class="form-control" name="price" placeholder="рубли,копейки" @if (old('price') !== null)value="{{ old('price') }}"@else @if ($product !== null) value="{{ $product->price->value() }}" @endif @endif>
              </div>
              <select class="form-select" name="category_id">
                <option selected>Категория</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if ((old('category_id') !== null) && (old('category_id') == $category->id)) selected @else @if (($product !== null) && ($product->category_id == $category->id)) selected @endif @endif>{{$category->title}}</option>
                @endforeach
              </select>
              @if($errors->any())
                  {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
              @endif
              <button class="btn btn-outline-secondary mt-3" type="submit">@if ($product !== null) Изменить @else Создать @endif</button>
            @csrf
            @if ($product !== null)
            @method('PUT')
            @endif
        </form>
    </div>
 @endsection