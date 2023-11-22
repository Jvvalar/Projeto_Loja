<?php
include '../conexao.php';

$sql = "SELECT 
    p.id, 
    p.produto, 
    p.valor, 
    c.descricao, 
    c.categoria_id,
    FROM categorias AS c inner join categorias as p on produtos;"
    

    $result = $conexao->query($sql);?>



<div class="container">
    <h1>Clientes</h1> 
    <a href="adicionar.php">Adicionar Novo Cliente</a> 
</div>


<table border="1">
    <thead>
        <tr>
            <th>Cód Produto</th>
            <th>Produto</th>
            <th>Valor</th>
            <th>Descricao</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["produto"] . "</td>";
                echo "<td>" . $row["valor"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>"; 
                echo "<td>" . $row["categoria_id"] . "</td>";
                echo "<td>
                <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Você Não tem Clientes</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conexao->close();
?>
