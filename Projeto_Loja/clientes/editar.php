<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', endereco='$endereco' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, email, telefone, endereco FROM clientes WHERE id=$id";
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

<link rel="stylesheet" type="text/css" href="../css/stylesEditar.css">
<div class="container">

    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        Nome: <input name="nome" value="<?php echo $tarefa['nome']; ?>"><br>
        Email: <input name="email" value="<?php echo $tarefa['email']; ?>"><br>
        Telefone: <input name="telefone" value="<?php echo $tarefa['telefone']; ?>"><br>
        Endereço: <input name="endereco" value="<?php echo $tarefa['endereco']; ?>"><br>
        <input type="submit" value="Salvar">
        <a href="listar.php">Voltar</a>
    </form>

</div>
