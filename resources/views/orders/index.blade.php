@extends('layouts.app') 

@section('title', 'Страница заказов') 

@section('content') 
    <h1>Список товаров</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Открыть список товаров</a>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Добавить заказ</a>

    <table class="table">
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Дата создания</th>
                <th>ФИО Покупателя</th>
                <th>Статус заказа</th>
                <th>Итоговая цена</th>
                <th>Просмотр</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_date->format('d-m-Y') }}</td>
                    <td>{{ $order->FIO }}</td>
                    <td>{{ $order->status ? 'выполнен' : 'новый' }}</td>
                    <td>{{ $order->price }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Просмотр</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


