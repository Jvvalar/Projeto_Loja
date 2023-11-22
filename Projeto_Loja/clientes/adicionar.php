<link rel="stylesheet" type="text/css" href="../css/stylesAdicionar.css">

<div class="container">

    <form method="post" action="adicionar.php">
        Nome: <input type="text" name="nome"><br>
        E-mail: <input type="text" name="email"><br>
        Telefone: <input type="text" name="telefone"><br>
        Endereço: <input type="text" name="endereco"><br>
        <input type="submit" value="Adicionar">

    </form>
</div>

<?php

include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql =
        "INSERT INTO
            clientes (nome, email, telefone, endereco)
        VALUES
            ('$nome', '$email', '$telefone', '$endereco')";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}

$conexao->close();

?>