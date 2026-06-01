<hr>

<h4> Usuários Cadastrados </h4> 

<table border="1" cellpadding="10"> <!-- cria a tabela -->

    <tr> <!-- insere uma linha -->
        <th>ID</th>
        <th>Usuários</th> <!-- insere os cabeçalhos -->
        <th>Senha</th>
    </tr>

    <?php
    
    $sqlUsuarios = "SELECT * FROM usuario"; //variável para pegar todos os dados de "usuario"

    $resultadoUsuario = $conn -> query($sqlUsuarios); //guardar os dados do banco

    while($linha = $resultadoUsuario -> fetch_assoc()){ //enquanto a variável linha for igual ao resultado, ele cria uma nova linha na tabela, fetch_assoc() transforma num array associativo para o php poder ler
        echo"<tr>
        
        <td>".$linha["id"]."</td>
        <td>".$linha["nome"]."</td>
        <td>".$linha["senha"]."</td>

        </tr>"; //cria uma nova linha na tabela com os dados do banco
    }
    
    
    ?>


</table>