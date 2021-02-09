@extends('layouts.app')

@section('content')    
    <h1>Editar Cliente</h1>
    <form action="{{ route('admin.customers.update', ['customer' => $customer->id]) }}" method="POST">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label>Nome Cliente</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
        </div>

        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="Address" class="form-control" value="{{ $customer->Address }}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Salvar</button>
        </div>
    </form>
@endsection