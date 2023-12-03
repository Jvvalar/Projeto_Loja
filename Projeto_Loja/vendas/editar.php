<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ID_cliente = $_POST['ID_cliente'];
    $data_hora = $_POST['data_hora'];
    $total = $_POST['total'];

    $sql = "UPDATE Vendas SET ID_cliente='$ID_cliente', data_hora='$data_hora', total='$total' WHERE ID=$id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT Vendas.ID, Clientes.nome AS nome_cliente, Vendas.data_hora, Vendas.total 
            FROM Vendas 
            INNER JOIN Clientes ON Vendas.ID_cliente = Clientes.ID
            WHERE Vendas.ID=$id";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $venda = $result->fetch_assoc();
    } else {
        echo "Venda não encontrada";
        exit;
    }
}


$sql_clientes = "SELECT ID, nome FROM Clientes";
$result_clientes = $conexao->query($sql_clientes);

$conexao->close();
?>

<link rel="stylesheet" type="text/css" href="../css/stylesEditar.css">

<body>
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?php echo $venda['ID']; ?>">
            ID do Cliente:
            <select name="ID_cliente">
                <?php
                if ($result_clientes->num_rows > 0) {
                    while ($row = $result_clientes->fetch_assoc()) {
                        $cliente_id = $row['ID'];
                        $cliente_nome = $row['nome'];
                        $selected = ($cliente_id == $venda['ID_cliente']) ? 'selected' : '';

                        echo "<option value='$cliente_id' $selected>$cliente_nome</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum cliente encontrado</option>";
                }
                ?>
            </select><br>

            Data e Hora: <input type="datetime-local" name="data_hora" value="<?php echo $venda['data_hora']; ?>"><br>
            Total: <input type="text" name="total" value="<?php echo $venda['total']; ?>"><br>
            <input type="submit" value="Salvar">
            <a href="listar.php">Voltar</a>
        </form>
    </div>
</body>