<?php

declare(strict_types=1);

namespace Database;

use Exception;
use Helpers\Configuration;
use PDO;
use PDOException;

abstract class Database{
    private string $host;
    private string $db_name;
    private string $username;
    private string $password;
    protected PDO | null $connection;
    public function __construct(){
        $credentials = Configuration::getFileContent('database');
        if(!empty($credentials)){
            $this->host = $credentials["host"];
            $this->db_name = $credentials["db_name"];
            $this->username = $credentials["username"];
            $this->password = $credentials["password"];

            try {
                $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset=utf8", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }else{
            throw new Exception("Credenciales inválidos en la conexión a la base de datos");
        }
    }

    public function __destruct() {
        $this->connection = null;
    }
}