@extends('layouts.app')

@section('content')    
<h1>Atualizar Produto</h1>
<form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST">
    @method('PUT')
    @csrf 
    <div class="form-group">
        <label>Nome Produto</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control" value="{{ $product->description }}">
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-success">Salvar</button>
    </div>
</form>
@endsection