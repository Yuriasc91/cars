<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="container">
    <div class="container">

        <Fieldset>
            <legend>Dados do carro</legend>
            <p>{{ $car->id }}</p>
            <p>{{ $car->name }}</p>
            <p>{{ $car->modelo }}</p>
            <p>{{ $car->year }}</p>
            <p>{{ $car->price }}</p>
            @if ($car->user_id == 0)
                <a class="btn btn-primary">Comprar</a>
            @endif
        </Fieldset>
    </div>
    <br>
</body>

</html>
