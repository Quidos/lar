<?php

namespace Quidos\Lar\Models;

use Quidos\Lar\Kernel\Model\Model;

class User extends Model {
    function find(int $id)
    {
        $stmt = $this->query(
            'SELECT * FROM users WHERE id = :id',
            ['id' => $id]
        );
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}