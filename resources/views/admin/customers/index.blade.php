@extends('layouts.app')

@section('content')

<a href="{{ route('admin.customers.create') }}" id="button_create" class="btn btn-lg btn-success">Criar Cliente</a>

<table class="table table-striped"  id="table_id">
    <thead>
        <tr>
            <th>#</th>
            <th>Clientes</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->Address}}</td>
                <td>
                    <a href="{{ route('admin.customers.edit', ['customer' => $customer->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="{{ route('admin.customers.destroy', ['customer' => $customer->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$customers->links()}}
@endsection