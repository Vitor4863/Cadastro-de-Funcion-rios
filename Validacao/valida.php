<?php
session_start();
include_once("../dao/conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    if (!empty($usuario) && !empty($senha)) {
        // Pesquisar o usuário no BD
        $result_usuario = "SELECT id, nome, email, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        
        if ($resultado_usuario && mysqli_num_rows($resultado_usuario) > 0) {
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            
            // Verifica se a senha digitada corresponde à senha criptografada no banco de dados
            if (password_verify($senha, $row_usuario['senha'])) {
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['email'] = $row_usuario['email'];
                header("Location: ../visao/modelo.php");
                exit();
            } else {
                $_SESSION['msg'] = "Login e senha incorretos!";
                header("Location: ../Login/index.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "Usuário não encontrado!";
            header("Location: ../Login/index.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Login e senha são obrigatórios!";
        header("Location: ../Login/index.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "";
    header("Location: ../Login/index.php");
    exit();
}
?>
