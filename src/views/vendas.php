<?php

require_once '../controller/VendasController.php';
require_once '../controller/ClientesController.php';
$vendas = new VendasController();
$clientes = new ClientesController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Vendas</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a>
            <a href="./realizarVenda.php" class="btn btn-sm btn-primary">Realizar venda</a>
        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th>#</th>
                <th>Cliente</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php


                foreach ($vendas->findAll() as $venda) { ?>
                    <tr>
                        <td> <?= $venda->getIdVenda() ?> </td>
                        <td> <?= $clientes->findOne($venda->getIdCliente())->getNome() ?> </td>
                        <td>R$ <?= number_format($venda->getValorTotal(), 2, ',', '') ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarVenda.php?id=<?= $venda->getIdVenda() ?>" class="btn btn-success">editar</a>
                                <button onclick="delVenda('<?= $venda->getIdVenda() ?>')" class="btn btn-danger">apagar</button>
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
<script src="../../public/js/delVenda.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

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