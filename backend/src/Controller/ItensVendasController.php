<?php

namespace src\Controller;

use src\Core\Request;
use src\Models\Vendas\ItensVendas;

class ItensVendasController extends Request
{
    private $itensVendas;

    public function __construct()
    {
        $this->itensVendas = new ItensVendas();
    }

    // Cria um novo produto
    public function create()
    {
        $data = $this->getRequestData();

        if (!isset($data['venda_id']) || empty($data['venda_id'])) {
            throw new \Exception('Informe o Id da venda do produto');
        }
        if (!isset($data['produto_id']) || empty($data['produto_id'])) {
            throw new \Exception('Informe o Id do produto');
        }
        if (!isset($data['qnt']) || empty($data['qnt'])) {
            throw new \Exception('Informe a Quantidade do produto para esta venda');
        }
        if (!isset($data['preco_unit']) || empty($data['preco_unit'])) {
            throw new \Exception('Informe o Preço unitário do produto');
        }
        if (!isset($data['subtotal']) || empty($data['subtotal'])) {
            throw new \Exception('Informe o Preço total');
        }
        if (!isset($data['imposto']) || empty($data['imposto'])) {
            throw new \Exception('Informe o Valor do imposto');
        }

        try {
            return $this->itensVendas->register($data);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getAll()
    {
        try {
            return $this->itensVendas->getAll();
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getById()
    {
        try {
            return $this->itensVendas->getById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Atualiza um produto
    public function update()
    {
    }

    // Deleta um produto
    public function delete()
    {
        try {
            return $this->itensVendas->deleteById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }
}
