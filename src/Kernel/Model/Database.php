<?php

namespace Quidos\Lar\Kernel\Model;

class Database {
    private static $instance;
    private $connection;
    private function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $this->connection = new \PDO(
            'mysql:host=' . $host . ';dbname=' . $db,
            $username,
            $password
        );
    }
    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    function getConnection()
    {
        return $this->connection;
    }
}