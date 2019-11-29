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

    <div class="alert alert-danger mt-1 alert-dismissible">
        <p>Este e-mail não consta na base de dados.</p>
        <button class="close" type="button" data-dismiss="alert">
            &times;
        </button>
    </div>

    <form action="{{ route('enviar.codigo') }}" method="post">
        @csrf
        <div class="card" style="width: 28rem; margin-left: 19em; margin-top: 20%;">
            <div class="card-body">
                <h5 class="card-title">Envio de código</h5>
                <h6 class="card-subtitle mb-3 text-muted">Insira um e-mail válido para que possamos
                    enviar o código de troca de senha.</h6>

                <input type="email" name="emailUsuario" class="form-control mb-3"
                       placeholder="Insira seu nome de usuário" required>

                <button type="submit" class="btn btn-success">Enviar código</button>

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
