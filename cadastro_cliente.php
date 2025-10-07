<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
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
        <h2>Cadastrar Cliente</h2>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cpf_cnpj" placeholder="CPF/CNPJ" required>
        <input type="email" name="email" placeholder="E-mail">
        <input type="text" name="telefone" placeholder="Telefone">
        <button type="submit">Salvar Cliente</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO clientes (nome, cpf_cnpj, email, telefone)
                VALUES ('$nome','$cpf_cnpj','$email','$telefone')";

        if ($conexao->query($sql) === TRUE) {
            echo "<p style='text-align:center;color:green;'>Cliente cadastrado com sucesso!</p>";
        } else {
            echo "<p style='text-align:center;color:red;'>Erro: " . $conexao->error . "</p>";
        }
    }
    ?>
</body>
</html>
