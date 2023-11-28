<?php include '../conexao.php'; ?>

<form method="post" action="adicionar.php">

    Produto <input type="text" name="produto"><br>
    Valor: <input type="float" name="valor"><br>
    Descrição: <input type="text" name="descricao"><br>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" id="categoria_id">
        <option value="">Selecione uma categoria</option>
        <?php
            $sql_categorias =
                "SELECT id, categoria
                    FROM categorias";
            $result_categorias = $conexao->query($sql_categorias);

            while ($row = $result_categorias->fetch_assoc()) {
                $categoria_id = $row['id'];
                $categoria_categoria = $row['categoria'];
            echo "<option value='$categoria_id'>$categoria_categoria</option>";
            }
        ?>
    </select>

    <input type="submit" value="Adicionar">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    $sql =
        "INSERT INTO
            produtos (produto, valor, descricao, ID_categoria)
        VALUES
            ('$produto', '$valor', '$descricao', '$categoria_id' )";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}   


?>