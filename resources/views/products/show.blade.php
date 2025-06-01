@extends('layouts.app') 

@section('title', 'Просмотр товара') 

@section('content') 
    <a href="{{ route('products.index') }}" class="btn btn-sm btn-warning">Вернуться на главную</a>

    <table class="table">
        <thead>
            <tr>
                <td>Название</td>
                <td>Категория</td>
                <td>Описание</td>
                <td>Цена</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
            </tr>
        </tbody>
    <table>
@endsection

