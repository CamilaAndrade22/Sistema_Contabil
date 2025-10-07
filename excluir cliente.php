<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id=$id";

if ($conexao->query($sql) === TRUE) {
    header("Location: listar_registros.php");
    exit;
} else {
    echo "Erro ao excluir: " . $conexao->error;
}
?>
