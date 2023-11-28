<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    $sql = "UPDATE produtos 
            SET produto='$produto', valor='$valor', descricao='$descricao', ID_categoria='$categoria_id' 
            WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT p.id, p.produto, p.valor, p.descricao, p.ID_categoria, c.categoria AS nome_categoria 
            FROM produtos AS p 
            INNER JOIN categorias AS c ON p.ID_categoria = c.ID 
            WHERE p.id=$id";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado";
        exit;
    }
}


$sql_categorias = "SELECT ID, categoria FROM categorias";
$result_categorias = $conexao->query($sql_categorias);

$conexao->close();
?>

<link rel="stylesheet" type="text/css" href="../css/stylesEditar.css">
<div class="container">
    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        Produto: <input name="produto" value="<?php echo $produto['produto']; ?>"><br>
        Valor: <input name="valor" value="<?php echo $produto['valor']; ?>"><br>
        Descrição: <input name="descricao" value="<?php echo $produto['descricao']; ?>"><br>
        Categoria:
        <select name="categoria_id">
            <?php
            if ($result_categorias->num_rows > 0) {
                while ($row = $result_categorias->fetch_assoc()) {
                    $categoria_id = $row['ID'];
                    $categoria_nome = $row['categoria'];
                    $selected = ($categoria_id == $produto['ID_categoria']) ? 'selected' : '';
                    echo "<option value='$categoria_id' $selected>$categoria_nome</option>";
                }
            } else {
                echo "<option value=''>Nenhuma categoria encontrada</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Salvar">
    </form>
</div>