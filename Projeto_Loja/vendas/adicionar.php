<link rel="stylesheet" type="text/css" href="../css/stylesAdicionar.css">

<div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        ID do Cliente: <input type="text" name="ID_cliente"><br>
        Data e Hora: <input type="datetime-local" name="data_hora"><br>
        Total: <input type="text" name="total"><br>
        <input type="submit" value="Adicionar">
        <a href="listar.php">Voltar</a>
    </form>

    <?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ID_cliente = $_POST['ID_cliente'];
        $data_hora = $_POST['data_hora'];
        $total = $_POST['total'];

        $verificar_cliente = "SELECT * FROM Clientes WHERE ID = $ID_cliente";
        $resultado = $conexao->query($verificar_cliente);

        if ($resultado->num_rows > 0) {
            $sql = "INSERT INTO Vendas (ID_cliente, data_hora, total) VALUES ('$ID_cliente', '$data_hora', '$total')";

            if ($conexao->query($sql) === TRUE) {
                header("Location: listar.php");
                exit();
            } else {
                echo "Erro ao adicionar venda: " . $conexao->error;
            }
        } else {
            echo "Este ID de cliente não existe.";
        }
    }

    $conexao->close();
    ?>
</div>