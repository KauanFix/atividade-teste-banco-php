<?php
session_start(); //inicia a sessão

//Variáveis para o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema_simples";

$conn = new mysqli($host, $user, $pass, $db, 6608); //conexão com o Banco de Dados

if ($conn->connect_error) { //if para verificar se foi realizada a conexão
    die("Erro na conexão");
} else {
    echo ("<p> BD: ok </p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //if para executar no envio do formulário de login

    $usuario = $_POST["usuario"]; //variáveis pegando os dados do formulário
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario 
    WHERE nome = '$usuario'
    AND senha = '$senha'"; //variável para pegar do banco os dados que correspondem ao formulário

    $resultado = $conn->query($sql); //variável para consultar o banco de dados que possua a variável "$sql"

    if ($resultado->num_rows > 0) { //se a quantidade de linhas for maior que 0 (se existir) ele redireciona para a Home
        $_SESSION["usuario"] = $usuario;

        header("location: public/home.php");
        exit();
    } else {
        $erro = "Usuario ou Senha Inválidos."; //erro para caso não encontre os dados
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
    if (isset($erro)) { //verifica se extiste a variável erro
        echo $erro; //mostra a variável erro
    }

    ?>

</body>

</html>