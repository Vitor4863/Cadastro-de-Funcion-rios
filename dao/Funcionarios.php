<?php

include_once 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de inserção aqui
    $username = $_POST['username'];
    $codigo = $_POST['codigo'];
    $status = $_POST['status'];
    $setores = $_POST['setores'];
    $loja = $_POST['loja'];

    // Agora você pode usar essas variáveis para inserir os dados no banco de dados
    $sql = "INSERT INTO clientes (nome_cliente, codigo, status, setor, loja) VALUES ('$username', '$codigo', '$status', '$setores', '$loja')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../visao/modelo.php");
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}


// Fecha a conexão
$conn->close();
?>
