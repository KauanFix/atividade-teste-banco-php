<?php
if ($conn->query($sql) === true) { //verifica se deu certo e alerta
            echo "<script>alert('Usuário Logado com sucesso!')</script>";
        } else {
            echo "<script>alert('ERRO!')</script>";
        }
        header("Location: home.php");
        exit();
?>