@extends('layouts.app')

@section('content')    
    <h1>Cadastrar Produto</h1>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf 
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome do Produto">
        </div>

        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Descrição do Produto">
        </div>

        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Preço do Produto">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
        </div>
    </form>
@endsection