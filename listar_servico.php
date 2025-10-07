<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serviços Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>SISTEMA CONTÁBIL</header>
    <nav>
        <a href="cadastro_cliente.php" class="cliente">Cadastrar Cliente</a>
        <a href="cadastro_servico.php" class="servico">Cadastrar Serviço</a>
        <a href="listar_registros.php" class="lista">Listar Serviços</a>
    </nav>

    <h2 style="text-align:center;">Serviços Cadastrados</h2>
    <table border="1" width="90%" align="center" cellpadding="10">
        <tr style="background:#1E3A8A;color:white;">
            <th>Nome do Serviço</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM servicos";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['nome_servico']."</td>
                        <td>".$row['descricao']."</td>
                        <td>
                            <a href='editar_servico.php?id=".$row['id']."' style='color:green;'>Editar</a> | 
                            <a href='excluir_servico.php?id=".$row['id']."' style='color:red;' onclick=\"return confirm('Tem certeza que deseja excluir?');\">Excluir</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>Nenhum serviço cadastrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
