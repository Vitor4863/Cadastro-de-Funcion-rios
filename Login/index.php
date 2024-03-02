<?php
session_start();

session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="estilo2.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/flame-outline.svg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form method="POST" action="../Validacao/valida.php"  >

            <div class="alerta"><?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			</div>
	
	
				<div class="social-container">
					<a href="" class="social"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
				</div>
				<h4>Entre com sua conta</h4>
				<input class="usu" type="text" name="usuario" placeholder="Digite o seu usuário">
				<input type="password" name="senha" placeholder="Digite a sua senha">
				
				  
				
                <button type="submit" name="btnLogin" value="Acessar">Acessar</button>  
				<a class= "conta" href="../cadastro/caduser.php">Crie sua conta</a> 
				
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
                     <img src="../img/logo-removebg-preview (1).png "alt="" width="300px">
					<h1</h1>
					<p></p>
				</div>
			</div>
		</div>
	</div>

	<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
	
</body>
</html>