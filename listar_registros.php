<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registros Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>SISTEMA CONTÁBIL</header>
    <nav>
        <a href="cadastro_cliente.php" class="cliente">Cadastrar Cliente</a>
        <a href="cadastro_servico.php" class="servico">Cadastrar Serviço</a>
        <a href="listar_registros.php" class="lista">Listar Registros</a>
    </nav>

    <?php
    // Atualização de Clientes
    if (isset($_POST['atualizar_cliente'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE clientes SET nome='$nome', cpf_cnpj='$cpf_cnpj', email='$email', telefone='$telefone' WHERE id=$id";
        $conexao->query($sql);

            header("Location: listar_registros.php");
    exit();
    }

    // Atualização de Serviços
    if (isset($_POST['atualizar_servico'])) {
        $id = $_POST['id'];
        $nome_servico = $_POST['nome_servico'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE servicos SET nome_servico='$nome_servico', descricao='$descricao' WHERE id=$id";
        $conexao->query($sql);

            header("Location: listar_registros.php");
    exit();
    }

    // Exclusão de Clientes
    if (isset($_GET['excluir_cliente'])) {
        $id = $_GET['excluir_cliente'];
        $conexao->query("DELETE FROM clientes WHERE id=$id");
    }

    // Exclusão de Serviços
    if (isset($_GET['excluir_servico'])) {
        $id = $_GET['excluir_servico'];
        $conexao->query("DELETE FROM servicos WHERE id=$id");
    }
    ?>

    <!-- Tabela de Clientes -->
    <h2 style="text-align:center;">Clientes Cadastrados</h2>
    <table border="1" width="80%" align="center" cellpadding="10">
        <tr style="background:#1E3A8A;color:white;">
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql_clientes = "SELECT * FROM clientes";
        $result_clientes = $conexao->query($sql_clientes);

        if ($result_clientes->num_rows > 0) {
            while($row = $result_clientes->fetch_assoc()) {
                if (isset($_GET['editar_cliente']) && $_GET['editar_cliente'] == $row['id']) {
                    // Linha em modo edição
                    echo "<tr>
                            <form method='post'>
                                <td><input type='text' name='nome' value='".$row['nome']."' required></td>
                                <td><input type='text' name='cpf_cnpj' value='".$row['cpf_cnpj']."' required></td>
                                <td><input type='email' name='email' value='".$row['email']."'></td>
                                <td><input type='text' name='telefone' value='".$row['telefone']."'></td>
                                <td>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <button type='submit' name='atualizar_cliente'>Salvar</button>
                                    <a href='listar_registros.php'>Cancelar</a>
                                </td>
                            </form>
                          </tr>";
                } else {
                    // Linha normal
                    echo "<tr>
                            <td>".$row['nome']."</td>
                            <td>".$row['cpf_cnpj']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['telefone']."</td>
                            <td>
            <a href='listar_registros.php?editar_cliente=".$row['id']."'>
    <img src='edit.svg' alt='Editar' width='20'>
</a>

<a href='listar_registros.php?excluir_cliente=".$row['id']."' onclick=\"return confirm('Tem certeza que deseja excluir este cliente?');\">
    <img src='delete.svg' alt='Excluir' width='20'>
</a>
</td>
</tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>Nenhum cliente cadastrado</td></tr>";
        }
        ?>
    </table>

    <!-- Tabela de Serviços -->
    <h2 style="text-align:center;">Serviços Cadastrados</h2>
    <table border="1" width="80%" align="center" cellpadding="10">
        <tr style="background:#1E3A8A;color:white;">
            <th>Nome do Serviço</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql_servicos = "SELECT * FROM servicos";
        $result_servicos = $conexao->query($sql_servicos);

        if ($result_servicos->num_rows > 0) {
            while($row = $result_servicos->fetch_assoc()) {
                if (isset($_GET['editar_servico']) && $_GET['editar_servico'] == $row['id']) {
                    // Linha em modo edição
                    echo "<tr>
                            <form method='post'>
                                <td><input type='text' name='nome_servico' value='".$row['nome_servico']."' required></td>
                                <td><input type='text' name='descricao' value='".$row['descricao']."'></td>
                                <td>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <button type='submit' name='atualizar_servico'>Salvar</button>
                                    <a href='listar_registros.php'>Cancelar</a>
                                </td>
                            </form>
                          </tr>";
                } else {
                    echo "<tr>
                            <td>".$row['nome_servico']."</td>
                            <td>".$row['descricao']."</td>
                            <td>
<a href='listar_registros.php?editar_cliente=".$row['id']."'>
    <img src='edit.svg' alt='Editar' width='20'>
</a>
<a href='listar_registros.php?excluir_servico=".$row['id']."' onclick=\"return confirm('Tem certeza que deseja excluir este serviço?');\">
    <img src='delete.svg' alt='Excluir' width='20'>
</a>   
</td>
 </tr>";
                }
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>Nenhum serviço cadastrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
