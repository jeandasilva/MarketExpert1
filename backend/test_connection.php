<?php
require_once 'src/Config/Database.php';

use src\Config\Database;

$database = new Database();
$conn = $database->getConnection();

if ($conn) {
    echo "Conexão com o banco de dados realizada com sucesso!";
} else {
    echo "Falha na conexão com o banco de dados.";
}
