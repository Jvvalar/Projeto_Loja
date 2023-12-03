<?php
include '../conexao.php';

$sql = "SELECT 
    p.id, 
    p.produto, 
    p.valor, 
    c.descricao, 
    c.categoria AS nome_categoria
FROM produtos AS p
INNER JOIN categorias AS c ON p.ID_categoria = c.ID";

$result = $conexao->query($sql);
?>

<link rel="stylesheet" type="text/css" href="../css/stylesListar.css">
<div class="container">
    <h1>Produtos</h1>
    <a href="adicionar.php">Adicionar Novo Produto</a>
</div>

<table>
    <thead>
        <tr>
            <th>Cód Produto</th>
            <th>Produto</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["produto"] . "</td>";
                echo "<td>" . $row["valor"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>" . $row["nome_categoria"] . "</td>";
                echo "<td>
                <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Você Não tem Produtos</td></tr>";
        }
        ?>
    </tbody>
</table><br><br>
<a href="../index.php">Voltar</a>


<?php
$conexao->close();
?>