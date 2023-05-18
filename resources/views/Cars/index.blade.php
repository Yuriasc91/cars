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
    @include('layouts.nav')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Preço</th>
                <th scope="col">user_id</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($cars))
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car['id'] }}</td>
                        <td>{{ $car['name'] }}</td>
                        <td>{{ $car['modelo'] }}</td>
                        <td>{{ $car['price'] }}</td>
                        <td>{{ $car['year'] }}</td>
                        <td>{{ $car['user_id'] }}</td>
                        <td>
                            <a href="{{ route('cars.show', $car['id']) }}" class="btn btn-outline-primary">Ver</a>
                            @if ($car->user_id == 1)
                                <a class="btn btn-outline-warning">Editar</a>
                                <a class="btn btn-outline-danger">Apagar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Nenhum resultado encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $cars->links('pagination::bootstrap-4') }}
</body>

</html>
