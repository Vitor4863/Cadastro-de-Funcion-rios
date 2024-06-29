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
            
          
        </nav>
    </header>
    <center>
    <h2>Editar Notebook</h2><br><br><br>
    <form action="atualizar_notebook.php" method="POST">
        <input type="hidden" name="notebook_id" value="<?php echo $notebook['id']; ?>">
        
        <label for="nome_notebook">Nome do Notebook:</label>
        <input type="text" id="nome_notebook" name="nome_notebook" value="<?php echo $notebook['nome_notebook']; ?>" required>

        <label for="codigo">Serial:</label>
        <input type="text" id="serial" name="serial" value="<?php echo $notebook['serial']; ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Disponivel" <?php echo ($notebook['status'] == 'Disponivel') ? 'selected' : ''; ?>>Disponível</option>
            <option value="Emprestado" <?php echo ($notebook['status'] == 'Emprestado') ? 'selected' : ''; ?>>Emprestado</option>
            <option value="Reservado" <?php echo ($notebook['status'] == 'Reservado') ? 'selected' : ''; ?>>Reservado</option>
            <!-- Adicione outras opções conforme necessário -->
        </select>

        <label for="location">Localização:</label>
<select id="location" name="localizacao" required>
    <option value="RH" <?php echo ($notebook['localizacao'] == 'RH') ? 'selected' : ''; ?>>RH</option>
    <option value="Indicadores" <?php echo ($notebook['localizacao'] == 'Indicadores') ? 'selected' : ''; ?>>Indicadores</option>
    <option value="CPD" <?php echo ($notebook['localizacao'] == 'CPD') ? 'selected' : ''; ?>>CPD</option>
    <option value="Juridico" <?php echo ($notebook['localizacao'] == 'Juridico') ? 'selected' : ''; ?>>Juridico</option>
    <option value="TI" <?php echo ($notebook['localizacao'] == 'TI') ? 'selected' : ''; ?>>TI</option>
    <option value="Diretoria" <?php echo ($notebook['localizacao'] == 'Diretoria') ? 'selected' : ''; ?>>Diretoria</option>
    <option value="Marketing" <?php echo ($notebook['localizacao'] == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
    <option value="Compras" <?php echo ($notebook['localizacao'] == 'Compras') ? 'selected' : ''; ?>>Compras</option>
    <option value="Manutenção" <?php echo ($notebook['localizacao'] == 'Manutenção') ? 'selected' : ''; ?>>Manutenção</option>
    <option value="Price" <?php echo ($notebook['localizacao'] == 'Price') ? 'selected' : ''; ?>>Price</option>
    <option value="Auditoria" <?php echo ($notebook['localizacao'] == 'Auditoria') ? 'selected' : ''; ?>>Auditoria</option>
    <option value="Contabilidade" <?php echo ($notebook['localizacao'] == 'Contabilidade') ? 'selected' : ''; ?>>Contabilidade</option>
    <option value="Finaceiro" <?php echo ($notebook['localizacao'] == 'Financeiro') ? 'selected' : ''; ?>>Finaceiro</option>
    <option value="Tesouraria" <?php echo ($notebook['localizacao'] == 'Tesouraria') ? 'selected' : ''; ?>>Tesouraria</option>
</select>

<input type="text" id="nome-usuario" name="nome_usuario" value="<?php echo $notebook['nome_usuario']; ?>" required placeholder="Nome do Usuário">
        

        <button type="submit">Atualizar Notebook</button>
    </form>
    </center>
    <br><br>
    <footer>
    </footer>

</body>
</html>
