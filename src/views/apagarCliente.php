<?php

require_once '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');

$cliente = new ClientesController();
$cliente->setIdCliente($_GET['id']);

try {
    $cliente->delete($cliente->getIdCliente());
    header('Location: ./clientes.php');
} catch (PDOException $err) {
    echo 'Erro';
}
