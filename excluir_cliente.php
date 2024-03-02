<?php
session_start();
include_once("conexao.php");

// Verifica se o ID do cliente está presente na URL
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão está aberta
    if (!$conn->connect_error) {
        // Utiliza Prepared Statement para evitar SQL Injection
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
        
        // Verifica se a preparação da declaração foi bem-sucedida
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();

            // Verifica se a exclusão foi bem-sucedida
            if ($stmt->affected_rows > 0) {
                $_SESSION['msg'] = "Cliente excluído com sucesso!";
            } else {
                $_SESSION['msg'] = "Erro: o cliente não foi excluído com sucesso.";
            }

            // Fecha o Prepared Statement
            $stmt->close();
        } else {
            $_SESSION['msg'] = "Erro na preparação da declaração SQL: " . $conn->error;
        }

        // Fecha a conexão
        $conn->close();
    } else {
        $_SESSION['msg'] = "Erro na conexão com o banco de dados: " . $conn->connect_error;
    }

    // Redireciona de acordo com a mensagem
    if (isset($_SESSION['msg'])) {
        $msgColor = ($_SESSION['msg']) ? 'green' : 'red';
        $_SESSION['msg'] = "<p style='color:$msgColor;'>" . $_SESSION['msg'] . "</p>";
    }
} else {
    $_SESSION['msg'] = "ID do cliente não especificado.";
}

header("Location: modelo.php");
exit();
?>
