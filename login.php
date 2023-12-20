
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
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form class="login-form" method="POST">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="enviar">Entrar</button>
            </form>
            <p class="signup-link">Ainda não tem uma conta? <a href="registrar.php">Cadastre-se aqui</a></p>
        </div>
    </div>


    <?php
    if (isset($_POST["enviar"])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION["username"] = $username;
        // Verificar as credenciais 
        if ($username != null && $password != null) {
            if ($crud->validate($username, $password)) {
                if ($username != "admin" && $password != "admin") {
                    header("Location: index.php");
                } else {
                    header("Location: admin.php");
                }
            }
        } else {
            echo 'preencha todos os campos ';
        }
    }

    ?>
</body>

</html>