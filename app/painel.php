<?php
session_start();

if (!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <header>
        <a href="?l=off">logout</a>
    </header>

    <main id="painel">

        <section id="aviso">
            <h2>Você Acessou com sucesso o painel</h2>
            <?php
            if($_SESSION['nivel'] == 1){
                echo "<h4>Seu nivel e administrador</h4>";
            }else if($_SESSION['nivel'] == 2){
                echo "<h4>Seu nivel e usuário</h4>";
            }
            ?>
        </section>

    </main>

</body>

</html>

<?php

$l = isset($_GET['l'])?$_GET['l']:'';

switch($l){
    case "off":
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION['nivel']);
        header("Location: ../");
        break;
}
