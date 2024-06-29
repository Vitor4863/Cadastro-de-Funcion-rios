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
    $notebook_id = $_POST['notebook_id'];
    $nome_notebook = $_POST['nome_notebook'];
    $serial = $_POST['serial'];
    $status = $_POST['status'];
    $localizacao = $_POST['localizacao'];
    $nome_usuario = $_POST["nome_usuario"];

    // Aqui você pode adicionar outros campos conforme necessário

    $sql = "UPDATE notebooks SET 
    nome_notebook = '$nome_notebook',
    serial = '$serial',
    status = '$status',
    localizacao = '$localizacao',
    nome_usuario = '$nome_usuario'
    WHERE id = $notebook_id";


    if ($conn->query($sql) === TRUE) {
        echo "Notebook atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o notebook: " . $conn->error;
    }
    header("Location: ../visao/modelo.php");
}

$conn->close();
?>
