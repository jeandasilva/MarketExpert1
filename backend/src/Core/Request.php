<?php

namespace src\Core;

class Request
{
    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getRequestData()
    {
        switch (self::getMethod()) {
            case 'get':
                return $_GET;
            case 'put':
            case 'delete':
                parse_str(file_get_contents("php://input"), $data);
                return (array) $data;
            case 'post':
                $data = json_decode(file_get_contents("php://input"));

                if ($data == null) {
                    $data = $_POST;
                }

                return (array) $data;
        }
    }
}
