<?php
session_start();
include_once("../dao/conexao.php");

// Verifica se o ID do notebook está presente na URL
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão está aberta
    if ($conn->connect_error) {
        $_SESSION['msg'] = "Erro na conexão com o banco de dados: " . $conn->connect_error;
        header("Location: ../visao/modelo.php");
        exit();
    }

    // Utiliza Prepared Statement para evitar SQL Injection
    $stmt = $conn->prepare("DELETE FROM notebooks WHERE id = ?");
    
    // Verifica se a preparação da declaração foi bem-sucedida
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            $_SESSION['msg'] = "Notebook excluído com sucesso!";
        } else {
            $_SESSION['msg'] = "Erro: o notebook não foi excluído com sucesso.";
        }

        // Fecha o Prepared Statement
        $stmt->close();
    } else {
        $_SESSION['msg'] = "Erro na preparação da declaração SQL: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
} else {
    $_SESSION['msg'] = "ID do notebook não especificado.";
}

// Redireciona para a página de modelo após a operação
header("Location: ../visao/modelo.php");
exit();
?>
