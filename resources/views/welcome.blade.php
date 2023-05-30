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

<body>
    <div class="container">
        <div class="row">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <div class="cols-lg-6">
                            <a href="{{ route('login') }}">Log in</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="cols-lg-6">
                                <a href="{{ route('register') }}">Registrar</a>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>

</html>
