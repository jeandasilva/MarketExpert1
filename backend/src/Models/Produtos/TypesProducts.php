<?php

namespace src\Models\Produtos;

use src\Manager\Query;

class TypesProducts extends Query
{
    public function __construct()
    {
        parent::__construct('tiposproduto');
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
            $products = $this->select(['*'], ["tipo_produto_id = $id"]);

            return json_encode($products);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function delete()
    {
        try {
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function register($data)
    {
        try {
            $countProduct = count(json_decode($this->getAll()));

            $data['tipo_produto_id'] = $countProduct;

            $data['imposto_percentual'] = $data['percent_imp'];

            unset($data['percent_imp']);
            
            var_dump($data);

            $this->add($data);

            return true;
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }
}
