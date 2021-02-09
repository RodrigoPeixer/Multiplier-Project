@extends('layouts.app')

@section('content')    
    <h1>Cadastrar Cliente</h1>
    <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf 
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome do Cliente">
        </div>

        <div class="form-group">
            <input type="text" name="Address" class="form-control" placeholder="Endereço do Cliente">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Cliente</button>
        </div>
    </form>
@endsection