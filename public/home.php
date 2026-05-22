<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("location:../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h2>Home</h2>

    <p>Usuario Logado:
        <?php echo $_SESSION["usuario"]; ?>

    </p>

    <a href="logout.php">Sair</a>


</body>

</html>