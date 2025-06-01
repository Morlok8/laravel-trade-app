
@extends('layouts.app') 

@section('content') 
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить товар</a>
    <a href="{{ route('orders.index') }}" class="btn btn-primary">Открыть список заказов</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Просмотр</th>
                <th>Редактирование</th>
                <th>Удаление</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-warning">Просмотреть</a>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
