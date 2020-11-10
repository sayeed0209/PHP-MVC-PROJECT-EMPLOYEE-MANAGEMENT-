<?php
require 'config/db.php';

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB_NAME');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
    }
    public  function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,

            ];
            $pdo = new PDO($connection, $this->user, $this->password);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection', $e->getMessage());
        }
    }
}
