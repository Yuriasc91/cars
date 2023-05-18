<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('cars.index') }}">Home</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cars.create') }}">Cadastrar Veículo</a>
        </li>
    </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="nav-link">
                {{ __('Sair') }}
            </button>
        </form>
</nav>
