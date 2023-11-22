<?php
include '../conexao.php';

$sql = "SELECT id, nome, email, telefone, endereco FROM clientes";
$result = $conexao->query($sql);?>




<div class="container">
    <h1>Clientes</h1> 
    <a href="adicionar.php">Adicionar Novo Cliente</a> 
</div>


<table border="1">
    <thead>
        <tr>
            <th>Cód Cliente</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>"; 
                echo "<td>" . $row["endereco"] . "</td>";
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
