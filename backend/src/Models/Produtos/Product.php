<?php

namespace src\Models\Produtos;

use src\Manager\Query;

class Product extends Query
{
    public function __construct()
    {
        parent::__construct('produtos');
    }

    public function getAll()
    {
        try {
            $products = $this->select();

            return json_encode($products);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getById(string $id)
    {
        try {
            $products = $this->select(['*'], ["produto_id = $id"]);

            return json_encode($products);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->deleteById($id);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function register($data)
    {
        try {
            $countProduct = count(json_decode($this->getAll()));

            $data['produto_id'] = $countProduct + 1;
            $data['tipo_produto_id'] = $data['tipo'];
            
            unset($data['tipo']);

            $data['quantidade_produto_estoque'] = $data['qnt'];
            
            unset($data['qnt']);

            $this->add($data);

            return true;
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }
}
