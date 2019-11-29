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
            <form action="{{ route('atualizar.senha') }}" method="POST">
                @csrf
                <div class="card" style="width: 28rem; margin-left: 19em; margin-top: 20%;">
                    <div class="card-body">
                        <h5 class="card-title">Alteração de senha</h5>
                        <h6 class="card-subtitle mb-3 text-muted">Foi enviado um código para seu e-mail. Utilize
                        este código para fazer a mudança de senha.</h6>

                        <input type="email" name="email" class="form-control mb-3"
                               placeholder="Insira o seu e-mail" required>
                        <input type="text" name="code" class="form-control mb-3"
                               placeholder="Insira o código recebido por e-mail" required>
                        <input type="text" name="newPassword" class="form-control mb-4"
                               placeholder="Insira sua nova senha" required>
                        <input type="text" name="confNP" class="form-control mb-4"
                               placeholder="Confirme sua nova senha" required>

                        <button type="submit" class="btn btn-primary">Atualizar Senha</button>

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
