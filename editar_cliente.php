<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$cliente_id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $cliente_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
} else {
    echo "Cliente não encontrado.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <!-- Adicione os metadados e links de estilo aqui -->
    <title>Editar Cliente - Supermercado</title>
</head>
<body>
<header>
        <div class="logo-container">
            <a href="./layout.html" id="logo"><img src="img/logo-removebg-preview.png" alt=""></a>
        </div>
       
        <nav id="menu">
            
            <a href="#">Cadastro</a>
            <a href="#">Consulta</a>
            <a href="#">Segurança</a>
            <a href="#">Contato</a>
        </nav>
    </header>
    <center>
    <h2>Editar Cliente</h2><br><br><br>
    <form action="atualizar_cliente.php" method="POST">
        <input type="hidden" name="cliente_id" value="<?php echo $cliente['id']; ?>">
        
        <label for="nome_cliente">Nome do Cliente:</label>
        <input type="text" id="nome_cliente" name="nome_cliente" value="<?php echo $cliente['nome_cliente']; ?>" required>

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo $cliente['codigo']; ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active" <?php echo ($cliente['status'] == 'active') ? 'selected' : ''; ?>>Ativo</option>
            <option value="blocked" <?php echo ($cliente['status'] == 'blocked') ? 'selected' : ''; ?>>Bloqueado</option>
            <!-- Adicione outras opções conforme necessário -->
        </select>

        <label for="setores">Setores:</label>
        <select id="setores" name="setores" required>
            <option value="RH" <?php echo ($cliente['setor'] == 'RH') ? 'selected' : ''; ?>>RH</option>
            <option value="CPD" <?php echo ($cliente['setor'] == 'CPD') ? 'selected' : ''; ?>>CPD</option>
            <option value="Ifood" <?php echo ($cliente['setor'] == 'Ifood') ? 'selected' : ''; ?>>Ifood</option>
            <option value="Jurdico" <?php echo ($cliente['setor'] == 'Juridico') ? 'selected' : ''; ?>>Juridico</option>
            <option value="Price" <?php echo ($cliente['setor'] == 'Price') ? 'selected' : ''; ?>>Price</option>
            <option value="Operador" <?php echo ($cliente['setor'] == 'Operador') ? 'selected' : ''; ?>>Operador</option>
            <option value="Prevenção" <?php echo ($cliente['setor'] == 'Prevenção') ? 'selected' : ''; ?>>prevenção</option>
            
            <!-- Adicione outras opções conforme necessário -->
        </select>

        <label for="loja">Loja:</label>
        <select id="loja" name="loja" required>
            <option value="Fonseca" <?php echo ($cliente['loja'] == 'Fonseca') ? 'selected' : ''; ?>>Fonseca</option>
            <option value="Barreto" <?php echo ($cliente['loja'] == 'Barreto') ? 'selected' : ''; ?>>Barreto</option>
            <option value="Largo" <?php echo ($cliente['loja'] == 'Largo') ? 'selected' : ''; ?>>Largo</option>
            <option value="Porto-Velho" <?php echo ($cliente['loja'] == 'Porto-Velho') ? 'selected' : ''; ?>>Porto-Velho</option>
            <option value="Porto-Novo" <?php echo ($cliente['loja'] == 'Porto-Novo') ? 'selected' : ''; ?>>Porto-Novo</option>
            <option value="Pirtininga" <?php echo ($cliente['loja'] == 'Piratininga') ? 'selected' : ''; ?>>Piratininga</option>
            <option value="Mesquita" <?php echo ($cliente['loja'] == 'Mesquita') ? 'selected' : ''; ?>>Mesquita</option>
            <!-- Adicione outras opções conforme necessário -->
        </select>

        <!-- Adicione outros campos conforme necessário -->

        <button type="submit">Atualizar Funcionario</button>
    </form>
    </center>
    <br><br><
    <footer>
    </footer>

</body>
</html>
