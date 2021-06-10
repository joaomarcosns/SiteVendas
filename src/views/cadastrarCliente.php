<?php
    require '../controller/ClientesController.php';
    $cliente = new ClientesController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a>
        </div>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome-cliente" class="form-label">Nome completo</label>
                <input type="text" name="nome-cliente" class="form-control" id="nome-cliente" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" step="any" name="cpf" class="form-control" id="cpf" required>
                </div>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        <?php

            if(!$_POST) return;
            $cliente->setNome($_POST['nome-cliente']);
            $cliente->setCpf($_POST['cpf']);

            try {
                $cliente->insert($cliente->getNome(), $cliente->getCpf());
                echo 'Cliente cadastrado com Sucesso!';
            } catch (PDOException $err) {
                echo 'Ocorreu um erro ao cadastrar o cliente!';
            }

        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>