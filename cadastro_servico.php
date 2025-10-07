<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Serviço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>SISTEMA CONTÁBIL</header>
    <nav>
        <a href="cadastro_cliente.php" class="cliente">Cadastrar Cliente</a>
        <a href="cadastro_servico.php" class="servico">Cadastrar Serviço</a>
        <a href="listar_registros.php" class="lista">Listar Registros</a>
    </nav>

    <form method="post">
        <h2>Cadastrar Serviço</h2>
        <input type="text" name="nome_servico" placeholder="Nome do Serviço" required>
        <textarea name="descricao" placeholder="Descrição do Serviço"></textarea>
        <button type="submit">Salvar Serviço</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_servico = $_POST['nome_servico'];
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO servicos (nome_servico, descricao)
                VALUES ('$nome_servico','$descricao')";

        if ($conexao->query($sql) === TRUE) {
            echo "<p style='text-align:center;color:green;'>Serviço cadastrado com sucesso!</p>";
        } else {
            echo "<p style='text-align:center;color:red;'>Erro: " . $conexao->error . "</p>";
        }
    }
    ?>
</body>
</html>
