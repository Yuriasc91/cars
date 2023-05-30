<nav class="navbar navbar-light bg-light justify-content-between">
    <div class="row">
        <div class="col-sm-3">
            <a class="navbar-brand" href="{{ route('cars.index') }}">Home</a>
        </div>
        <div class="col-sm-3">
            <a class="nav-link" href="{{ route('cars.create') }}">Cadastrar Veículo</a>
        </div>
        <div class="col-sm-3">
            <p>Usuário: {{ Auth::user()->name }}</p>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-primary" href="{{route('user.acquired')}}">Adquiridos</a>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="btn btn-outline-primary my-2 my-sm-0">
            {{ __('Sair') }}
        </button>
    </form>
</nav>
