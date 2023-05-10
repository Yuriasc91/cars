<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
            </a>
        </x-slot>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="form-control" type="text" name="name" value="" required autofocus />
                            </div>
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="form-control" type="email" name="email" value="" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                            </div>
                            <div class="mt-4">
                                <label>Tipo de usuário</label>
                                <select name="seller">
                                    <option value="0">Comprador</option>
                                    <option value="1">Vendedor</option>
                                </select>
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-button class="btn btn-primary">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
