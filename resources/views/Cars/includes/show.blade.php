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
            <legend>Dados do carro</legend>
            @foreach ($car as $key => $value)
                <p>Nome: {{ $value->Car[0]->name }}</p>
                <p>Modelo: {{ $value->Car[0]->modelo }}</p>
                <p>Ano: {{ $value->Car[0]->year }}</p>
                <p>Preço: {{ $value->Car[0]->price }}</p>
                <hr>
                @if (isset($value->Users[0]->id) && $value->Users[0]->id == $user)
                    <p style="color: green;">Você já possui esse carro</p>
                @else
                    <a href="{{ route('sell.perform', $value->Car[0]->id) }}" class="btn btn-outline-success">Comprar</a>
                @endif
            @endforeach
        </Fieldset>
    </div>
    <br>
</body>

</html>
