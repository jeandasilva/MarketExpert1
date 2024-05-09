<?php

namespace src\Manager;

use src\Manager\Base;

class Query extends Base
{
    private $tableName = null;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
        parent::__construct();
    }

    public function select($fields = ['*'], $conditions = [], $orderBy = null, $limit = null)
    {

        $query = "SELECT " . implode(",", $fields) . " FROM $this->tableName";

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }
        if ($limit) {
            $query .= " LIMIT $limit";
        }

        $stmt = $this->fetchAll($query);

        return $stmt;
    }

    public function __arrayKey($data)
    {
        return array_keys($data);
    }

    public function add($data)
    {

        $fields = implode(', ', $this->__arrayKey($data));

        $placeHolder = ':' . implode(', :', $this->__arrayKey($data));

        $sql = "INSERT INTO $this->tableName ($fields) VALUES ($placeHolder)";

        $this->execute($sql, $data);
    }

    public function deleteById(string $id)
    {
        $query = "DELETE FROM $this->tableName WHERE produto_id = ?";

        $stmt = $this->execute($query, [$id]);

        return $stmt;
    }

    public function update()
    {
    }

    public function getQuery(string $query, array $params)
    {
    }
}
