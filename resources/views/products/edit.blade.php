@extends('layouts.app') 

@section('title', 'Редактирование товара')

    <a href="{{ route('products.index') }}" class="btn btn-primary">Открыть список товаров</a>


@section('content') 
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group pb-3">
            <label>Название</label>
            <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
        </div>
        <div class="form-group pb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control" value="">{{ $product->description }}</textarea>
        </div>
        <div class="form-group pb-3">
            <label>Цена</label>
            <input type="number" step="0.01" name="price" class="form-control" required value="{{ $product->price }}">
        </div>
        <div class="form-group pb-3">
            <label>Категория</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
@endsection
