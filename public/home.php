<?php

session_start();

include("../infra/db/connect.php"); //include aquela função do connect

if (!isset($_SESSION["usuario"])) { //se a sessão 'usuario' não existir, redireciona para o index
    header("location:../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //"no envio do formulário"
    if (isset($_POST["cadastrar"])) {
        $usuarios = $_POST["usuario"]; //pega os dados do formulário de cadastro
        $senha = $_POST["senha"];

        $sql = "INSERT INTO usuario (nome, senha) VALUES ('$usuarios', '$senha')"; //insere os dados no banco

        if ($conn->query($sql) === true) { //verifica se deu certo e alerta
            echo "<script>alert('Usuário Logado com sucesso!')</script>";
        } else {
            echo "<script>alert('ERRO!')</script>";
        }
    }
}

if(isset($_POST["excluir"])) { //"quando postar o botão de name 'excluir' faça isso"

    $id = $_POST["excluirUsuario"]; //variável id pegar o post do select

    $sql = "DELETE FROM usuario WHERE id = $id"; //deleta tudo onde o id for igual do select

    if ($conn->query($sql) === true) { //verifica se deu certo e alerta
            echo "<script>alert('Usuário Excluído com sucesso!')</script>";
        } else {
            echo "<script>alert('ERRO!')</script>";
        }
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

    <h2>Cadastrar novo usuario</h2>

    <form method="POST">
        <label for="usuario">Úsuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button type="submit" name="cadastrar">Entrar</button>

        <form method="POST">
            <label for="excluirUsuario">Selecione o ID para excluir o usuário</label>
            <select name="excluirUsuario" id="selectExcluir">
                <?php

                $sqlID = "SELECT id FROM usuario"; //variável para pegar i id de "usuario"
                
                $resultadoID = $conn->query($sqlID); //guardar os ids do banco
                
                while ($linha = $resultadoID->fetch_assoc()) { //enquanto a variável linha for igual ao resultado, ele cria uma nova linha na tabela, fetch_assoc() transforma num array associativo para o php poder ler
                    echo "<option value=" . $linha["id"] . ">" . $linha["id"] . "</option>"; //cria uma nova option com os ids
                }


                ?>

            </select>
            <button type='submit' name="excluir"> 
                <img src='../assets/images/lixeira_icon.png' alt='excluir usuario' height='35px' width='35px'>
            </button>
        </form>


    </form>

    <?php

    include("../public/component/table.php"); //pega a função de table.php

    ?>

</body>

</html>