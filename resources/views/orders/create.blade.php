@extends('layouts.app') 

@section('title', 'Создание заказа') 

@section('content')
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>ФИО покупателя</label>
            <input type="text" name="FIO" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Дата создания</label>
            <input type="date" name="order_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Количество</label>
            <input type="number" step="1" name="number" class="form-control" id = "number" required value="1">
        </div>
        <div class="form-group">
            <label>Комментарий</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Товар</label>
            <select name="product_id" class="form-control" required id = "product_id">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price = "{{ $product->price }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h2>Итоговая цена:</h2>
            <h2 id = "final_price"></h2>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded',function(){
            var selected, price;

            calculate(document.querySelector('#product_id'), document.querySelector('#number'));

            document.querySelector('#product_id').addEventListener('change', function(){
                calculate(document.querySelector('#product_id'), document.querySelector('#number'));
            });
            document.querySelector('#number').addEventListener('change', function(){
                calculate(document.querySelector('#product_id'), document.querySelector('#number'));
            });

            function calculate(select, number){
                const selectedOption = select.options[select.selectedIndex];
                let price = selectedOption.dataset.price;
                document.querySelector('#final_price').innerText = Number(price) * Number(number.value);
            }
        });
    </script>
@endsection


