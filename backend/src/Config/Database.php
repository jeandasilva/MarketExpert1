<?php

namespace src\Config;

    class Database
{
    private $host = "localhost";
    private $db_name = "market";
    private $username = "postgres";
    private $password = "admin";
    private $port = 5432;

    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {

            $dsn = "pgsql:host=$this->host;port=$this->port;dbname=$this->db_name";

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->conn = new \PDO($dsn, $this->username, $this->password, $options);
        } catch (\PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
