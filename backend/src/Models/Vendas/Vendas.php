<?php

namespace src\Models\Vendas;

use src\Manager\Query;

class Vendas extends Query
{
    public function __construct()
    {
        parent::__construct('vendas');
    }

    public function getAll()
    {
        try {
            $vendas = $this->select();

            return json_encode($vendas);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getById(string $id)
    {
        try {
            $vendas = $this->select(['*'], ["venda_id = $id"]);

            return json_encode($vendas);
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

            $data['venda_id'] = $countProduct + 1;

            $this->add($data);

            return true;
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }
}
