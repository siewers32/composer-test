<?php

namespace App\Models;
use App\Container\Container;
use App\Traits\toJson;
use \PDO;

class Model
{
    use toJson;

    protected $conn;
    protected $json;
    protected $table;
    protected $pk;

    public function __construct(Container $c)
    {
        $db = $c->get_service('db');
        $this->conn = $db->get_connection();
        $this->json = $c->get_service('json');
    }

    public function all()
    {
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch($id)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE ".$this->pk."= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->getJson($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function insert($set)
    {
        $sql = 'INSERT INTO ' . $this->table . '(' . implode(", ", array_keys($set))
            . ') VALUES (\'' . implode("', '", $set)
            . '\')';
        //print $sql;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $this->fetch($this->conn->lastInsertId());
    }
}