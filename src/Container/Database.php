<?php
namespace App\Container;
use \PDO as PDO;

class Database
{

    private $connection;

    public function __construct() {
        $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'];
        $this->connection =  new PDO($dsn, $_ENV['DB_USER'] , $_ENV['DB_PASSWORD']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get_connection()
    {
        return $this->connection;
    }
 }