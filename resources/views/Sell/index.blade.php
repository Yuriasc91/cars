<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="container">
    @include('layouts.nav')
    <div class="container">
        <Fieldset>
            <legend>Dados do Veículo</legend>
            @foreach ($car as $item)
                <p>Nome: {{ $item->Car[0]->name }}</p>
                <p>Modelo: {{ $item->Car[0]->modelo }}</p>
                <p>Ano: {{ $item->Car[0]->year }}</p>
                <p>Preço: {{ $item->Car[0]->price }}</p>
                <a href="{{ route('sell.perform', $item->Car[0]->id) }}" class="btn btn-outline-success">Comprar</a>
            @endforeach
        </Fieldset>
    </div>
    <br>
</body>

</html>
