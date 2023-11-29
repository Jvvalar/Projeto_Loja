<?php
include '../conexao.php';

$sql = "SELECT ID, categoria, descricao FROM Categorias"; 
$result = $conexao->query($sql);

if ($result === false) {
    echo "Erro na consulta: " . $conexao->error;
}

?>
<link rel="stylesheet" type="text/css" href="../css/stylesListar.css">

<h1>Venda</h1>
<a href="adicionar.php">Nova Venda</a>

<table>
    <thead>
        <tr>
            <th>Cód Venda</th>
            <th>Cliente</th>
            <th>Valor</th> 
            <th>Pegamento</th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>"; 
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>"; 
                echo "<td>
                <a href='editar.php?id=" . $row["ID"] . "'>Editar</a> | 
                <a href='deletar.php?id=" . $row["ID"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Você não tem categorias</td></tr>";
        }
        ?>
    </tbody>
</table><br><br>

<a href="../index.php">Voltar</a>

<?php
$conexao->close();
?>
