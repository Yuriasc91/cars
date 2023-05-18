<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
</head>

<body>
    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif
    <div class="container">
        <h2>Cadastrar Veículo</h2>
        <div class="row">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('cars.store') }}">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label>Nome</label>
                            <input id="name" name="name" class="form-control" type="text" value=""
                                required autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Modelo</label>
                            <input id="modelo" name="modelo" class="form-control" type="text" value=""
                                required autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Ano</label>
                            <input id="year" name="year" class="year form-control" type="text" value=""
                                required autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Preço</label>
                            <input id="price" name="price" class="price form-control" type="text"
                                value="" required autofocus />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div>
                            <button class="btn btn-outline-primary">Cadastrar</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>
<script>
    $('.price').mask('#.##0,00', {
        reverse: true
    });
    $('.year').mask('#.##0,00', {
        reverse: true
    });
</script>

</html>
