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
        @if (!empty($acquired))
            @foreach ($acquired as $item)
                <div class="row">
                    <div class="col-lg-4">
                        <form action="{{ route('sell.sale') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $item->Car[0]->id }}" />
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" name="name" id="name"
                                    value="{{ $item->Car[0]->name }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>Modelo</label>
                                <input class="form-control" name="modelo" id="modelo"
                                    value="{{ $item->Car[0]->modelo }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>Ano</label>
                                <input class="form-control" name="year" id="year" type="text"
                                    value="{{ $item->Car[0]->year }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Preço*</p></label>
                                <input required class="form-control" name="price" id="price"
                                    value="{{ $item->Car[0]->price }}" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success">Colocar à venda</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
        @else
            <p>Nenhum veículo adquirido</p>
        @endif
    </div>
    <br>
</body>

</html>
