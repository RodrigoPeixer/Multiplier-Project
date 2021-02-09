@extends('layouts.app')

@section('content')

<a href="{{ route('admin.products.create') }}" id="button_create" class="btn btn-lg btn-success">Criar Produto</a>

<table class="table table-striped" id="table_id">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>R$ {{$p->price}}</td>
                <td>
                    <a href="{{ route('admin.products.edit', ['product' => $p->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="{{ route('admin.products.destroy', ['product' => $p->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}
@endsection