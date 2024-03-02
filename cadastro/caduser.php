<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" href="estilo3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/phosphor-icons"></script>
	<title>Cadastrar</title>
</head>
<body>
	
	<div class="container" id="container">
		<div class="form-container log-in-container">
		<a class= "login" href="../Login/index.php"><i class="ph-arrow-circle-left"></i> </a>
		<form action="../dao/cadastro.php" method="Post">
			<img src="../img/logo-removebg-preview.png" alt="">
			<br><br>
        <label >Nome</label>
        <input type="text" name="nome" placeholder="Digite seu nome" require>
        <label>Email</label>
        <input type="text" name="email" placeholder="Digite seu email" require>
        <label >Usuario</label>
        <input type="text" name="usuario" placeholder="Digite o usuario" require>
        <label >Senha</label>
        <input type="password" name="senha" placeholder="Digite sua senha" require>
        <div class="wthree-text">
		<input type="submit" name="btnLogin" value="Enviar" require>
		</div>
		
		</div>
	</div>
	
	<script src="./main.js">
	
	</script>
</body>
</html>
