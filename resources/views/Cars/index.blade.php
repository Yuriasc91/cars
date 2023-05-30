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
    <form class="form-inline" method="POST" action="{{ route('cars.search') }}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <input class="form-control" name="search" id="search" type="text"
                    placeholder="Nome/Modelo/Ano/Preço">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>
    @if (session('msg'))
        <div>
            <p style="color: green">{{ session('msg') }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Preço</th>
                <th style="text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $key => $value)
                <tr>
                    <td>{{ $value->Car[0]->id }}</td>
                    <td>{{ $value->Car[0]->name }}</td>
                    <td>{{ $value->Car[0]->modelo }}</td>
                    <td>{{ $value->Car[0]->year }}</td>
                    <td>{{ $value->Car[0]->price }}</td>
                    <td style="text-align: center;">
                        @if ( isset($value->Users[0]->id) && $value->Users[0]->id == $user)
                            <a href="{{ route('cars.show', $value->Car[0]->id) }}"
                                class="btn btn-outline-primary">Ver</a>
                        @else
                            <a href="{{ route('cars.show', $value->Car[0]->id) }}"
                                class="btn btn-outline-primary">Ver</a>
                            <a href="{{ route('sell.index', $value->Car[0]->id) }}"
                                class="btn btn-outline-success">Comprar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @if (isset($filters))
        {{ $cars->appends($filters)->links('pagination::bootstrap-4') }}
    @else
        {{ $cars->links('pagination::bootstrap-4') }}
    @endif --}}
</body>

</html>
