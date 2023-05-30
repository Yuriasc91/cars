<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Cars</h1>
        <div class="row">
            <div class="col-lg-6">
                <a href=" {{ route('cars.index') }} " type="button" class="btn btn-primary">Veículos</a>
            </div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">
                        {{ __('Sair') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
