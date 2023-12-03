<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];


    $sql = "UPDATE categorias SET categoria='$categoria', descricao='$descricao' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, categoria, descricao FROM categorias WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado";
        exit;
    }
}

$conexao->close();
?>



<form method="post" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    Categoria: <input name="categoria" value="<?php echo $tarefa['categoria']; ?>"></input><br>
    Descricao: <input name="descricao" value ="<?php echo $tarefa['descricao']; ?>"></input><br>

    <input type="submit" value="Salvar">
    <a href="listar.php">Voltar</a>
</form>
