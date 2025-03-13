@extends('layouts.app')
@section('content')
	<div class="row mt-3">
		<h3>Добавление товара</h3>
	</div>
	<div class="row mt-3">
        <form action="{{ route('product.create') }}" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text">Название</span>
                <input type="text" name="title" class="form-control" @if (old('title') !== null)value="{{ old('title') }}"@endif >
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Описание</span>
                <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Цена</span>
                <input type="number" step="0.01" class="form-control" name="price" placeholder="рубли,копейки" value="{{ old('price') }}">
              </div>
              <select class="form-select" name="category_id">
                <option selected>Категория</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if ((old('category_id') !== null) && (old('category_id') == $category->id)) selected @endif>{{$category->title}}</option>
                @endforeach
              </select>
              @if($errors->any())
                  {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
              @endif
              <button class="btn btn-outline-secondary mt-3" type="submit">Создать</button>
            @csrf
        </form>
    </div>
 @endsection