<?php
namespace App\Kernel\Database;

use App\Kernel\Config\Config;
use App\Kernel\Config\ConfigInterface;
use PDO;
use PDOException;


class Database implements DatabaseInterface
{

    private ConfigInterface $config;
    private PDO $pdo;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        $this->connect();
    }
    public function insert($table, $data)
    {
        $fields = array_keys($data);
        $columns = implode(',', $fields);
        $binds = implode(',', array_map(fn($field) => ":$field", $fields));

        $sql = "INSERT INTO $table ($columns) VALUES ($binds)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($data);
        } catch (PDOException) {
            return false;
        }
        return $this->pdo->lastInsertId();

    }
    private function connect()
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try {
            $this->pdo = new PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (PDOException $exception) {
            echo $exception;
        }


    }
}