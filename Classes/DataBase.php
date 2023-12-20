<?php
class Database
{
    private $host = "localhost";
    private $gtarefas = "gtarefas";
    private $usuario = "root";
    private $senha = "";
    public $conn;
    public function getConnection()
    {
        

        try {
            $this->conn = new PDO("mysql:host=" . $this->host .
                ";dbname=" . $this->gtarefas, $this->usuario, $this->senha);
        } catch (PDOException $exception) { 
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
        
    }
}