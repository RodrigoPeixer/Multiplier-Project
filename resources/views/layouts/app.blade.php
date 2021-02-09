<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Multiplier</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/estilo.css') }}">
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('admin.customers.index') }}">CLIENTES</a></li>
            <li><a href="{{ route('admin.orders.index')}}">PEDIDOS</a></li>
            <li><a href="{{ route('admin.products.index') }}">PRODUTOS</a></li>
        </ul>
    </nav>
</div>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );
    </script>

</body>

</html>