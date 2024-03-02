<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $nome_cliente = $_POST['nome_cliente'];
    $codigo = $_POST['codigo'];
    $status = $_POST['status'];
    $setores = $_POST['setores'];
    $loja = $_POST['loja'];

    // Aqui você pode adicionar outros campos conforme necessário

    $sql = "UPDATE clientes SET 
            nome_cliente = '$nome_cliente',
            codigo = '$codigo',
            status = '$status',
            setor = '$setores',
            loja = '$loja'
            WHERE id = $cliente_id";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o cliente: " . $conn->error;
    }
    header("Location: ../visao/modelo.php");
}

$conn->close();
?>
