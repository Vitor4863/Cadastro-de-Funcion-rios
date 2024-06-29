<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de inserção aqui
    $nome_notebook = $_POST["nome_notebook"];
    $serial = $_POST['serial'];
    $status = $_POST['status'];
    $localizacao = $_POST["localizacao"];
   $nome_usuario = $_POST["nome_usuario"];
    // Montar a query SQL para inserir os dados
    $sql = "INSERT INTO notebooks (nome_notebook, serial, status, localizacao,nome_usuario) 
            VALUES ('$nome_notebook', '$serial', '$status', '$localizacao', '$nome_usuario')";

    // Executar a query SQL e verificar se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página de modelo após inserção bem-sucedida
        header("Location: ../visao/modelo.php");
        exit(); // Garante que o script encerre após o redirecionamento
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
