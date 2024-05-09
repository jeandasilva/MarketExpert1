<?php

class Router
{
    public function __construct()
    {
        $this->__validationRouter();
    }

    private function __getRoutes()
    {
        return [
            'GET' => [
                '/products/all' => ['ProductController', 'getAll'],
                '/products/byId' => ['ProductController', 'getById'],

                '/types/products/all' => ['ProductTypeController', 'getAll'],
                '/types/products/byId' => ['ProductTypeController', 'getById'],

                '/vendas/all' => ['VendasController', 'getAll'],
                '/vendas/byId' => ['VendasController', 'getById'],

                '/itens/vendas/all' => ['ItensVendasController', 'getAll'],
                '/itens/vendas/byId' => ['ItensVendasController', 'getById'],
            ],
            "POST" => [
                '/products' => ['ProductController', 'create'],
                '/types/products' => ['ProductTypeController', 'create'],
                '/vendas' => ['VendasController', 'create'],
                '/itens/vendas' => ['ItensVendasController', 'create'],
            ],
            'DELETE' => [
                '/products' => ['ProductController', 'delete']
            ],
        ];
    }

    private function __validationRouter()
    {
        try {
            $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
            $request = $_SERVER['REQUEST_METHOD'];

            if (!isset($this->__getRoutes()[$request])) {
                throw new Exception('A rota não existe');
            }

            if (!array_key_exists($uri, $this->__getRoutes()[$request])) {
                throw new Exception('A rota não existe');
            }

            $nameController = $this->__getRoutes()[$request][$uri];

            $namespaceController = "src\\Controller\\$nameController[0]";

            if (!class_exists($namespaceController)) {
                throw new Exception("O controller não existe");
            }

            $controller = new $namespaceController();
            $method = $nameController[1];

            if (!method_exists($controller, $method)) {
                throw new Exception('Método não existe');
            }

            echo $controller->$method();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
