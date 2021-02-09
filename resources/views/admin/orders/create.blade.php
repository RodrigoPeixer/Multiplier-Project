@extends('layouts.app')

@section('content')    
    <h1>Cadastrar Pedido</h1>
    <form action="{{ route('admin.orders.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="customer">Cliente</label>
            <select name="customer" id="customer" class="form-control">
                @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">
                        {{$customer->name}}
                    </option>   
                @endforeach
            </select>
        </div>     

        <div class="card">
            <div class="card-header">
                Produto
            </div>
    
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="product0">
                            <td>
                                <select name="products[]" class="form-control">
                                    <option value="">Escolha um Produto</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }} (${{ number_format($product->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="amounts[]" class="form-control" value="1" />
                            </td>
                        </tr>
                        <tr id="product1"></tr>
                    </tbody>
                </table>
    
                <div class="row">
                    <div class="col-md-12">
                        <button id="add_row" class="btn btn-success pull-left">Adicionar</button>
                        <button id='delete_row' class="pull-right btn btn-danger">Remover</button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Pedido</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
        let row_number = 1;
        $("#add_row").click(function(e){
        e.preventDefault();
        let new_row_number = row_number - 1;
        $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
        $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
        row_number++;
        });

        $("#delete_row").click(function(e){
        e.preventDefault();
        if(row_number > 1){
            $("#product" + (row_number - 1)).html('');
            row_number--;
        }
        });
    });
  </script>                              
@endsection