<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'conexao.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados enviados via POST
    $nome_notebook = $_POST["nome_notebook"];
    $serial = $_POST["serial"];
    $status = $_POST["status"];
    $localizacao = $_POST["localizacao"];
    $nome_usuario = $_POST["nome_usuario"];

    // Prepara a query SQL usando Prepared Statements
    $sql = "INSERT INTO notebooks (nome_notebook, serial, status, localizacao, nome_usuario) VALUES (?, ?, ?, ?,?)";

    // Prepara a declaração
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Binda parâmetros às variáveis
        mysqli_stmt_bind_param($stmt, "ssss", $nome_notebook, $codigo, $status, $localizacao);

        // Executa a declaração
        if (mysqli_stmt_execute($stmt)) {
            $msg = "Notebook cadastrado com sucesso!";
        } else {
            $msg = "Erro ao cadastrar notebook: " . mysqli_stmt_error($stmt);
        }

        // Fecha a declaração
        mysqli_stmt_close($stmt);
    } else {
        $msg = "Erro na preparação da declaração SQL: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);

    // Exibe um alerta em JavaScript com a mensagem de sucesso ou erro e redireciona para o index
    echo "<script>alert ('".$msg."'); location.href='index.php';</script>";
} else {
    // Se o formulário não foi enviado via POST, redireciona para o index
    header("Location: index.php");
    exit();
}
?>
