<link rel="stylesheet" type="text/css" href="../css/stylesAdicionar.css">

<div class="container">

    <form method="post" action="adicionar.php">
        Categoria: <input type="text" name="categoria"><br>
        Descrição: <input type="text" name="descricao"><br>
        <input type="submit" value="Adicionar">
        <a href="listar.php">Voltar</a>
    </form>

</div>


<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql =
        "INSERT INTO
            categorias (categoria, descricao)
        VALUES
            ('$categoria', '$descricao')";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}

$conexao->close();

?>