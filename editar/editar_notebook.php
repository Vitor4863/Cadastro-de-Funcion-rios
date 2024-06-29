<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$notebook_id = $_GET['id'];

$sql = "SELECT * FROM notebooks WHERE id = $notebook_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $notebook = $result->fetch_assoc();
} else {
    echo "Notebook não encontrado.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <!-- Adicione os metadados e links de estilo aqui -->
    <title>Editar Notebook</title>
</head>
<body>
<header>
        <div class="logo-container">
            <a href="./layout.html" id="logo"><img src="../img/logo-removebg-preview.png" alt=""></a>
        </div>
       
        <nav id="menu">
            
            <a href="#">Cadastro</a>
            <a href="#">Consulta</a>
            <a href="#">Segurança</a>
            <a href="#">Contato</a>
        </nav>
    </header>
    <center>
    <h2>Editar Notebook</h2><br><br><br>
    <form action="atualizar_notebook.php" method="POST">
        <input type="hidden" name="notebook_id" value="<?php echo $notebook['id']; ?>">
        
        <label for="nome_notebook">Nome do Notebook:</label>
        <input type="text" id="nome_notebook" name="nome_notebook" value="<?php echo $notebook['nome_notebook']; ?>" required>

        <label for="codigo">Serial:</label>
        <input type="text" id="codigo" name="serial" value="<?php echo $notebook['serial']; ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Disponivel" <?php echo ($notebook['status'] == 'Disponivel') ? 'selected' : ''; ?>>Disponível</option>
            <option value="Emprestado" <?php echo ($notebook['status'] == 'Emprestado') ? 'selected' : ''; ?>>Emprestado</option>
            <option value="Reservado" <?php echo ($notebook['status'] == 'Reservado') ? 'selected' : ''; ?>>Reservado</option>
            <!-- Adicione outras opções conforme necessário -->
        </select>

        <label for="localizacao">Localização:</label>
        <input type="text" id="localizacao" name="localizacao" value="<?php echo $notebook['localizacao']; ?>" required>
        <input type="text" id="nome-usuario" name="nome_usuario" required placeholder="Nome do Usuario">
        <!-- Adicione outros campos conforme necessário -->

        <button type="submit">Atualizar Notebook</button>
    </form>
    </center>
    <br><br>
    <footer>
    </footer>

</body>
</html>
