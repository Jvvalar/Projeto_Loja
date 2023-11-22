<?php
include '../conexao.php';

$sql = "SELECT id, categoria, descricao FROM categorias";
$result = $conexao->query($sql);
?>
<link rel="stylesheet" type="text/css" href="../css/stylesListar.css">


<h1>Categorias</h1> 
<a href="adicionar.php">Adicionar Nova Categoria</a> 

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Descricao</th>
            <th>Ações</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>
                <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Você não tem categorias</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conexao->close();
?>
