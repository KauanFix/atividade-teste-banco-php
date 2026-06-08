<?php
if (!isset($_SESSION["usuario"])) { //se a sessão 'usuario' não existir, redireciona para o index
    header("location:../index.php");
    exit();
}
?>