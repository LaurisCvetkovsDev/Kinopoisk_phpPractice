<?php
namespace App\Kernel\Database;

use App\Kernel\Config\ConfigInterface;
use PDO;
use PDOException;

class Database implements DatabaseInterface
{
    private ConfigInterface $config;
    private PDO $pdo;
    public function insert($table, $name)
    {

    }
    private function connect()
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('datbase.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.cahrset');

        try {
            $this->pdo = new PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (PDOException $exception) {
            echo ($exception);
        }


    }
}