<?php

namespace src\Models\Vendas;

use src\Manager\Query;

class ItensVendas extends Query
{
    public function __construct()
    {
        parent::__construct('itensvenda');
    }

    public function getAll()
    {
        try {
            $itensVendas = $this->select();

            return json_encode($itensVendas);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getById(string $id)
    {
        try {
            $itensVendas = $this->select(['*'], ["tipo_venda_id = $id"]);

            return json_encode($itensVendas);
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

            $data['item_venda_id'] = $countProduct + 1;
            $data['preco_unitario'] = $data['preco_unit'];

            unset($data['preco_unit']);

            $data['preco_unitario'] = $data['qnt'];

            unset($data['qnt']);

            $this->add($data);

            return true;
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }
}
