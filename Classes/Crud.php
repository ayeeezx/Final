<?php
class Crud
{
    private $conn;
    private $table_name = "usuarios";
    public function __construct($db)

    {
        $this->conn = $db;
    }
    public function create($nome, $senha)
    {
        $query = "INSERT INTO gtarefas." . $this->table_name . " (nome, senha) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $senha]);
        return $stmt;
    }

        




    // --------------------------------------------READ----------------------------------------------
    public function read()
    {
        $query = "SELECT * FROM gtarefas." . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function read2($id)
    {
        $query = "SELECT * FROM gtarefas." . $this->table_name. " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function readEdit($id)
    {
        $query = "SELECT * FROM gtarefas." . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    // --------------------------------------------READ----------------------------------------------






    public function update($id, $nome, $senha, $curso)
    {
        $query = "UPDATE gtarefas." . $this->table_name . " SET nome = ?, senha = ?, idCurso = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome, $senha, $curso, $id]);
        return $stmt;
    }
    public function updateCurso($nome)
    {
        $query = "UPDATE gtarefas.usuarios SET idCurso = 1 WHERE nome = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nome]);
        return $stmt;
    }

    public function delete($id)
    {
        $query = "DELETE FROM gtarefas." . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
    public function validate($nome, $senha)
    {

        try {

            $stmt = $this->conn->prepare("SELECT * FROM gtarefas.usuarios WHERE login = :username");
            $stmt->bindParam(':username', $nome);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && $senha == $user['senha']) {
                // Login bem-sucedido
                session_start();
                $_SESSION['username'] = $user['nome'];
                return true;
            } else {
                // Credenciais inválidas
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }
    public function insert($login, $senha, $email)
    {

        $query = "INSERT INTO gtarefas.usuarios (login, senha, email) VALUES
        (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$login, $senha, $email]);

        return $stmt;
    }
}