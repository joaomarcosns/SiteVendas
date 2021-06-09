<?php

class Venda
{

    private $idVenda;
    private $idCliente;
    private $valorTotal;
    
    public function __construct($idVenda, $idCliente, $valorTotal)
    {
        $this->idVenda = $idVenda;
        $this->idCliente = $idCliente;
        $this->valorTotal = $valorTotal;
    }
    /**
     * @return mixed
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param mixed $idVenda
     */
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @param mixed $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

}