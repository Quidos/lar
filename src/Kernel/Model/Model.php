<?php

namespace Quidos\Lar\Kernel\Model;

use ReflectionClass;

class Model {
    protected $connection;
    protected $tableName;
    function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
        $this->tableName = strtolower((new ReflectionClass($this))->getShortName()) . 's';
    }

    /**
     * Query the database.
     * @param string $sql SQL statement
     * @param array $params params to bind to the statement
     */
    public function query(string $sql, array $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function all()
    {
        $stmt = $this->query(
            'SELECT * FROM ' . $this->tableName
        );
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}