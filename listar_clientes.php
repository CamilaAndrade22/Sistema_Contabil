<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>SISTEMA CONTÁBIL</header>
    <nav>
        <a href="cadastro_cliente.php" class="cliente">Cadastrar Cliente</a>
        <a href="cadastro_servico.php" class="servico">Cadastrar Serviço</a>
        <a href="listar_registros.php" class="lista">Listar Registros</a>
    </nav>

    <h2 style="text-align:center;">Clientes Cadastrados</h2>
    <table border="1" width="80%" align="center" cellpadding="10">
        <tr style="background:#1E3A8A;color:white;">
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
        <?php
        $sql = "SELECT * FROM clientes";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['nome']."</td>
                        <td>".$row['cpf_cnpj']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['telefone']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' style='text-align:center;'>Nenhum cliente cadastrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>

