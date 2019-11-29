<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .body {
            background-color: #282f3a;
        }
    </style>

    <title>Hello, world!</title>
</head>

<body class="body">
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @if(session('msg'))
                <div class="alert alert-danger">
                    {{session('msg')}}
                </div>
            @endif

                <div class="alert alert-success mt-1 alert-dismissible">
                    <p>Senha alterada com sucesso. Agora você pode fazer login com a nova senha! :)</p>
                    <button class="close" type="button" data-dismiss="alert">
                        &times;
                    </button>
                </div>

            <form action="{{ route('fazer.login') }}" method="POST">
                @csrf
                <div class="card" style="width: 28rem; margin-left: 19em; margin-top: 20%;">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <h6 class="card-subtitle mb-3 text-muted">Inicie com sua autenticação</h6>

                        <input type="email" name="email" class="form-control mb-3"
                               placeholder="Insira seu nome de usuário" required>
                        <input type="password" name="password" class="form-control mb-4"
                               placeholder="Insira sua senha">

                        <a href="{{ route('esqueci.senha') }}">Esqueci minha senha</a>
                        <br><br>
                        <button type="submit" class="btn btn-success">Entrar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
