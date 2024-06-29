<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="estilo3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/phosphor-icons"></script>
    <!-- Adicione outros metadados e links de estilo conforme necessário -->
</head>
<body>
    
    <div class="container" id="container">
        <div class="form-container log-in-container">
            <a class="login" href="../Login/index.php"><i class="ph-arrow-circle-left"></i> Voltar para Login</a>
            <form action="../dao/cadastroUser.php" method="POST">
                <img src="../img/logo-removebg-preview.png" alt="Logo">
                <br><br>
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" placeholder="Digite o usuário" required>
                
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                
                <div class="wthree-text">
                    <input type="submit" name="btnLogin" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    
    <!-- Inclua scripts JavaScript conforme necessário -->
    <script src="./main.js"></script>
</body>
</html>
