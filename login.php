<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>

    <main id="containerLogin">

        <form action="#" method="post">

            <div id="img">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="icon-input">
                <div class="icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input type="text" name="usuario" placeholder="Usuário">
            </div>

            <div class="icon-input">
                <div class="icon">
                    <i class="fa-solid fa-key"></i>
                </div>
                <input type="password" name="senha" placeholder="Senha">
            </div>

            <button>LOGIN</button>

        </form>
    </main>

</body>

</html>


<?php

$conn = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($conn, 'login');

$usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
$senha = isset($_POST['senha'])?$_POST['senha']:"";

$select = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
$query = mysqli_query($conn, $select);

if($query -> num_rows > 0){
    $listar = $query -> fetch_assoc();

    $_SESSION['usuario'] = $listar['usuario'];
    $_SESSION['senha'] = $listar['senha'];
    $_SESSION['nivel'] = $listar['nivel'];
    
    header("Location: app/painel.php");
}