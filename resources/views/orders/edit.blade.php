@extends('layouts.app') 

@section('title', 'Редактирование заказа') 
<a href="{{ route('orders.index') }}" class="btn btn-primary">Открыть список заказов</a>

@section('content') 
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>ФИО: </label>
            <span>{{ $order->FIO }}</span>
        </div>

        <div class="form-group">
            <label>Дата создания:</label>
            <span> {{ $order->order_date->format('d-m-Y') }} </span>
        </div>
        

        <div class="form-group">
            <label>Комментарий:</label>
            <span>{{ $order->comment }}</span>
        </div>

        <div class="form-group">
            <label>Товар: </label>
            <span>{{ $product->name }} </span>
        </div>

        <div class="form-group">
            <label>Количество: </label>
            <span>{{ $order->number }} </span>
        </div>

        <div class="form-group">
            <label>Статус: </label>
            @if(!$order->status)
            <form action="{{ route('orders.update', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger">Изменить статус</button>
            </form>
            @else
            <span>
                выполнен
            </span>
            @endif
        </div>

        <div class="form-group">
            <label>Цена: </label>
            <span>{{ $order->price }} </span>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection

