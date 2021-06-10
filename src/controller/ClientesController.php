<?php

require_once '../model/Cliente.php';
require_once '../model/Database.php';

class ClientesController extends Cliente
{
    protected $tabela = 'clientes';

    public function __construct()
    {
    }

    public function findOne($idCliente)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idCliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        $stm->execute();
        $cliente = new Cliente(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $cliente->setIdCliente($cl->idCliente);
            $cliente->setNome($cl->nome);
            $cliente->setCpf($cl->cpf);
        }
        return $cliente;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $clientes = array();

        foreach ($stm->fetchAll() as $cliente) {
            $clientes[] = new cliente($cliente->idCliente, $cliente->nome, $cliente->cpf);
        }
        return $clientes;
    }

    public function delete($idCliente)
    {

        $query = "DELETE FROM $this->tabela WHERE idCliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idCliente)
    {
        $cpf = $this->getCpf();
        $this->setIdCliente($idCliente);
        $query = "UPDATE $this->tabela SET nome = :nome, cpf = :cpf WHERE idCliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getIdCliente(), PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getNome());
        $stm->bindParam(':cpf', $cpf);
        return $stm->execute();
    }

    public function insert($nome, $cpf)
    {
        $query = "INSERT INTO $this->tabela (nome, cpf) VALUES (:nome, :cpf)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':cpf', $cpf);
        return $stm->execute();
    }

}
