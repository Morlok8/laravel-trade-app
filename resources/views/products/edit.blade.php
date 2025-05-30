<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Поля как в create, но с value="{{ $product->name }}" и т.д. -->
     <div class="form-group">
        <label>Название</label>
        <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea name="description" class="form-control" value="{{ $product->description }}"></textarea>
    </div>
    <div class="form-group">
        <label>Цена</label>
        <input type="number" step="0.01" name="price" class="form-control" required value="{{ $product->price }}">
    </div>
    <div class="form-group">
        <label>Категория</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>