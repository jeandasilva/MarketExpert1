<?php

namespace src\Controller;

use src\Core\Request;
use src\Models\Vendas\Vendas;

class VendasController extends Request
{
    private $vendasModel;

    public function __construct()
    {
        $this->vendasModel = new Vendas();
    }

    // Cria um novo produto
    public function create()
    {
        $data = $this->getRequestData();

        if (!isset($data['data_venda']) || empty($data['data_venda'])) {
            throw new \Exception('Informe a Data da venda do produto');
        }
        if (!isset($data['total_imposto']) || empty($data['total_imposto'])) {
            throw new \Exception('Informe o Total de imposto do produto');
        }
        if (!isset($data['total']) || empty($data['total'])) {
            throw new \Exception('Informe o Preço total da venda');
        }

        try {
            return $this->vendasModel->register($data);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getAll()
    {
        try {
            return $this->vendasModel->getAll();
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getById()
    {
        try {
            return $this->vendasModel->getById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Atualiza um produto
    public function update()
    {
        // $data = json_decode(file_get_contents("php://input"), true);
        // if ($this->vendasModel->update($data['produto_id'], $data['nome'], $data['preco'], $data['tipo_produto_id'], $data['quantidade_produto_estoque'], $data['imagem'])) {
        //     echo json_encode(['message' => 'Produto atualizado com sucesso']);
        // } else {
        //     echo json_encode(['message' => 'Erro ao atualizar produto']);
        // }
    }

    // Deleta um produto
    public function delete()
    {
        try {
            return $this->vendasModel->deleteById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
        // $data = json_decode(file_get_contents("php://input"), true);
        // if ($this->vendasModel->delete($data['produto_id'])) {
        //     echo json_encode(['message' => 'Produto deletado com sucesso']);
        // } else {
        //     echo json_encode(['message' => 'Erro ao deletar produto']);
        // }
    }
}
