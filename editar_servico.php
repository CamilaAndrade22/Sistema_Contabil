<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM servicos WHERE id=$id";
$result = $conexao->query($sql);
$servico = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_servico = $_POST['nome_servico'];
    $descricao = $_POST['descricao'];

    $sql_update = "UPDATE servicos SET nome_servico='$nome_servico', descricao='$descricao' WHERE id=$id";

    if ($conexao->query($sql_update) === TRUE) {
        header("Location: listar_registros.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>
<form method="post">
    <h2>Editar Serviço</h2>
    <input type="text" name="nome_servico" value="<?php echo $servico['nome_servico']; ?>" required>
    <textarea name="descricao"><?php echo $servico['descricao']; ?></textarea>
    <button type="submit">Salvar Alterações</button>
</form>
