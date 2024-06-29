<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
include_once 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Verifica se todos os campos foram preenchidos
    if (!empty($nome) && !empty($email) && !empty($usuario) && !empty($senha)) {
        // Hash da senha para maior segurança
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Query de inserção
        $sql = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES ('$nome', '$email', '$usuario', '$senhaHash')";

        // Executa a query e verifica se foi bem-sucedida
        if (mysqli_query($conn, $sql)) {
            $_SESSION['msg'] = "Cadastro realizado com sucesso!";
            header("Location: ../Login/index.php");
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar: " . mysqli_error($conn);
            header("Location: ../Login/index.php");
        }
    } else {
        $_SESSION['msg'] = "Preencha todos os campos.";
        header("Location: ../Login/index.php");
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    header("Location: ../Login/index.php");
}
?>
