<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id=$id";
$result = $conexao->query($sql);
$cliente = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql_update = "UPDATE clientes SET nome='$nome', cpf_cnpj='$cpf_cnpj', email='$email', telefone='$telefone' WHERE id=$id";

    if ($conexao->query($sql_update) === TRUE) {
        header("Location: listar_registros.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>
<form method="post">
    <h2>Editar Cliente</h2>
    <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required>
    <input type="text" name="cpf_cnpj" value="<?php echo $cliente['cpf_cnpj']; ?>" required>
    <input type="email" name="email" value="<?php echo $cliente['email']; ?>">
    <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>">
    <button type="submit">Salvar Alterações</button>
</form>
