<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Preço</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{$car['id']}}</td>
                <td>{{$car['name']}}</td>
                <td>{{$car['modelo']}}</td>
                <td>{{$car['price']}}</td>
                <td>{{$car['year']}}</td>
                <td><button class="btn btn-outline-primary">Ver</button><button class="btn btn-outline-warning">Editar</button><button class="btn btn-outline-danger">Apagar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<div class="container">
    <a href="{{route('cars.create')}}" class="btn btn-outline-primary">Cadastrar Veículo</a>
</div>
</html>
