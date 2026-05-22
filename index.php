<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema_simples";

$conn = new mysqli($host, $user, $pass, $db, 6608);

if ($conn->connect_error) {
    die("Erro na conexão");
} else {
    echo ("<p> BD: ok </p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario
    WHERE nome = '$usuario'
    AND senha = '$senha'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;

        header("location: public/home.php");
        exit();
    } else {
        $erro = "Usuario ou Senha Inválidos.";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.php</title>
</head>

<body>
    <h2>Login com PHP</h2>

    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button type="submit">Entrar</button>

    </form>

    <?php
    if (isset($erro)) {
        echo $erro;
    }



    ?>

</body>

</html>