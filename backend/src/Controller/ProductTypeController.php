<?php

namespace src\Controller;

use src\Core\Request;
use src\Models\Produtos\TypesProducts;

class ProductTypeController extends Request
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new TypesProducts();
    }

    // Cria um novo produto
    public function create()
    {
        $data = $this->getRequestData();

        if (!isset($data['percent_imp']) || empty($data['percent_imp'])) {
            throw new \Exception('Informe a quantidade de imposto sobre o produto');
        }
        if (!isset($data['descricao']) || empty($data['descricao'])) {
            throw new \Exception('Informe uma descrição para o produto');
        }
        try {
            return $this->productModel->register($data);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getAll()
    {
        try {
            return $this->productModel->getAll();
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Lê todos os produtos
    public function getById()
    {
        try {
            return $this->productModel->getById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }



    // Atualiza um produto
    public function update()
    {
        // $data = json_decode(file_get_contents("php://input"), true);
        // if ($this->productModel->update($data['produto_id'], $data['nome'], $data['preco'], $data['tipo_produto_id'], $data['quantidade_produto_estoque'], $data['imagem'])) {
        //     echo json_encode(['message' => 'Produto atualizado com sucesso']);
        // } else {
        //     echo json_encode(['message' => 'Erro ao atualizar produto']);
        // }
    }

    // Deleta um produto
    public function delete()
    {
        try {
            return $this->productModel->deleteById(1);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
        // $data = json_decode(file_get_contents("php://input"), true);
        // if ($this->productModel->delete($data['produto_id'])) {
        //     echo json_encode(['message' => 'Produto deletado com sucesso']);
        // } else {
        //     echo json_encode(['message' => 'Erro ao deletar produto']);
        // }
    }
}
