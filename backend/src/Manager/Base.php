<?php

namespace src\Manager;

use src\Config\Database;

class Base extends Database
{
    private $sql;

    public function __construct()
    {
        $this->sql = $this->getConnection();
    }

    public function prepare($query){
        return $this->sql->prepare($query);
    }

    public function execute($query, $params = [])
    {
        try {
            $stmt = $this->sql->prepare($query);

            $stmt->execute($params);

            return $stmt;
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }

    public function fetchAll($query, $params = [])
    {
        try {
            $stmt = $this->execute($query, $params);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }

    public function fetch($query, $params = [])
    {
        try {
            $stmt = $this->execute($query, $params);

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }
}
