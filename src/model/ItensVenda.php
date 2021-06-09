<?php

class ItensVenda
{

    private $idItensVenda;
    private $idVenda;
    private $idProduto;
    private $quantidade;
    private $valorUnitario;
    
    public function __construct($idItensVenda, $idVenda, $idProduto, $quantidade, $valorUnitario)
    {
        $this->idItensVenda = $idItensVenda;
        $this->idVenda = $idVenda;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }

    /**
     * @return mixed
     */
    public function getIdItensVenda()
    {
        return $this->idItensVenda;
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
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @return mixed
     */
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * @param mixed $idItensVenda
     */
    public function setIdItensVenda($idItensVenda)
    {
        $this->idItensVenda = $idItensVenda;
    }

    /**
     * @param mixed $idVenda
     */
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    /**
     * @param mixed $idProduto
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @param mixed $valorUnitario
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

}