<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: app/painel.php");
}else{
    header("Location: login.php");
}