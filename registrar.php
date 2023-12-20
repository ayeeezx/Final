<?php
include_once './config/config.php';
include_once './classes/Crud.php';
$crud = new Crud($db);
$data = $crud->read();
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regandlogin.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Cadastro</h2>
            <form class="login-form" method="POST">
                <label for="fullname">Usuario</label>
                <input type="text" id="user" name="username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="enviar">Cadastrar</button>
            </form>
            <p class="signup-link">Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
        </div>
    </div>
    <?php
    include_once('./Config/Config.php');
    include_once('./Classes/Crud.php');
    
    if (isset($_POST["enviar"])) {
        echo"aqui";
        if (
            $_POST["password"] != null && $_POST["username"] != null && $_POST['email'] != null
        ) {
            $crud = new Crud($db);
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST['email'];
            $isEqual = false;
            $result = $crud->read();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                if ($row['login'] == $username) {
                    $isEqual = true;
                }
            }
            if ($isEqual == false) {
                $crud->insert($username, $password, $email);
                echo '<script type="text/javascript"> window.location.href="login.php"; </script>';
            }
        }
    }
    ?>
</body>

</html>