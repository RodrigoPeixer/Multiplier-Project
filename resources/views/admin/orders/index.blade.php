@extends('layouts.app')

@section('content')
<a href="{{ route('admin.orders.create') }}" id="button_create" class="btn btn-lg btn-success">Criar Pedido</a>

<table class="table table-striped" id="table_id">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Produtos</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
    </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->customer->name}}</td>
                    <td>
                        <ul>
                            @foreach($order->products as $item)
                                <li>{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{$order->total}}</td>
                    <td>
                        <a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="{{ route('admin.orders.destroy', ['order' => $order->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection