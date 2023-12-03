<?php
include '../conexao.php';

$sql = "SELECT Vendas.ID, Clientes.nome AS nome_cliente, Vendas.data_hora, Vendas.total 
        FROM Vendas 
        INNER JOIN Clientes ON Vendas.ID_cliente = Clientes.ID";
$resultado = $conexao->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vendas</title>
    <link rel="stylesheet" type="text/css" href="../css/stylesListar.css">
</head>

<body>
    <h1>Vendas</h1>
    <a href="adicionar.php">Adicionar Nova Venda</a>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Cód Venda</th>
                    <th>Nome do Cliente</th>
                    <th>Data e Hora</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["nome_cliente"] . "</td>";
                        echo "<td>" . $row["data_hora"] . "</td>";
                        echo "<td>" . $row["total"] . "</td>";
                        echo "<td>
                        <a href='editar.php?id=" . $row["ID"] . "'>Editar</a> | 
                        <a href='deletar.php?id=" . $row["ID"] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhuma venda encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table><br><br>
    </div>

    <a href="../index.php">Voltar</a>
    
    <?php
    $conexao->close();
    ?>
</body>

</html>