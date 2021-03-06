<?php

require_once '../controller/ProdutosController.php';
$produtos = new ProdutosController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Produtos</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a>
            <a href="./cadastrarProduto.php" class="btn btn-sm btn-primary">Cadastrar produto</a>
        </div>
        <table class="table table-striped" id="table">
            <thead >
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($produtos->findAll() as $produto) { ?>
                    <tr>
                        <td> <?= $produto->getId() ?> </td>
                        <td> <?= $produto->getNome() ?> </td>
                        <td>R$ <?= number_format($produto->getPreco(), 2, ',', '') ?> </td>
                        <td> <?= $produto->getQuantidade() ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="editarProduto.php?id=<?= $produto->getId() ?>" class="btn btn-success">editar</a>
                                <a href="./apagarProduto.php?id=<?= $produto->getId() ?>" class="btn btn-danger">apagar</a>
                            </div>
                        </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

</body>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
        $('#table').DataTable({
            responsive: true,

            "aaSorting": [],
            "pageLength": 50,
            "language": {
                "decimal": "",
                "emptyTable": "Sem dados disponíveis",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
                "infoFiltered": "(filtrado de _MAX_ registos no total)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registos",
                "loadingRecords": "A carregar dados...",
                "processing": "A processar...",
                "search": "Procurar:",
                "zeroRecords": "Não foram encontrados resultados",
                "paginate": {
                    "first": "Primeiro",
                    "last": "Último",
                    "next": "Seguinte",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": ordem crescente",
                    "sortDescending": ": ordem decrescente"
                }
            }
        });
    </script>



</html>