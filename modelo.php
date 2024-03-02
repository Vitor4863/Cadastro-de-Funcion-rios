<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
    <title>Layout com Gerenciamento de Usuários - Supermercado</title>
</head>
<body>

    <header>
        <div class="logo-container">
            <a href="./layout.html" id="logo"><img src="img/logo-removebg-preview.png" alt=""></a>
        </div>
        <button id="openMenu">&#9776;</button>
        <nav id="menu">
            <button id="closeMenu">X</button>
            <a href="#">Cadastro</a>
            <a href="#">Consulta</a>
            <a href="#">Segurança</a>
            <a href="#">Contato</a>
        </nav>
    </header>

    <aside>
        <center>
            <h2>Gerenciar Funcionarios</h2>
            <form action="conexao.php" method="POST" id="userForm">
                <label for="username">Nome do Cliente:</label>
                <input type="text" id="username" name="username" required placeholder="Usuário">
                <label for="username">Código:</label>
                <input type="text" id="codigo" name="codigo" required placeholder="Código">

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="active">Ativo</option>
                    <option value="blocked">Bloqueado</option>
                    <!-- Adicione opções conforme necessário -->
                </select>
                <label for="status">Setores:</label>
                <select id="setores" name="setores" required>
                    <option value="RH">RH</option>
                    <option value="CPD">CPD</option>
                    <option value="Prevenção">Prevenção</option>
                    <option value="Operador">Operador</option>
                    <option value="Price">Price</option>
                    <option value="IFood">IFood</option>
                    <option value="Jurídico">Jurídico</option>
                    <!-- Adicione opções conforme necessário -->
                </select>

                <label for="status">Loja:</label>
                <select id="loja" name="loja" required>
                    <option value="Fonseca">Fonseca</option>
                    <option value="Barreto">Barreto</option>
                    <option value="Porto-Velho">Porto-Velho</option>
                    <option value="Porto-Nov o">Porto=Novo</option>
                    <option value="Largo">Largo</option>
                    <option value="Piratininga">Piratininga</option>
                    <option value="Mesquita">Mesquita</option>
                    <!-- Adicione opções conforme necessário -->
                </select>

                <button type="submit">Criar Funcionario</button>
            </form>
        </center>
    </aside>

    <main>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Realiza a consulta SQL para obter os dados da tabela clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os dados em uma tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome do Cliente</th><th>Código</th><th>Status</th><th>Setor</th><th>Loja</th><th>Editar</th><th>Ex</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome_cliente"] . "</td>";
        echo "<td>" . $row["codigo"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["setor"] . "</td>";
        echo "<td>" . $row["loja"] . "</td>";
        echo "<td style='background-color: #0000FF; border-radius: 1000px;'>
        <a href='editar_cliente.php?id=" . $row['id'] . "' style='color: #fff; text-decoration: none; display: block; padding: 5px 10px; border-radius: inherit;'>Editar</a>
      </td>";
echo "<td style='background-color: #FFA500; border-radius: 100px;'>
        <a href='excluir_cliente.php?id=" . $row['id'] . "' style='color: #fff; text-decoration: none; display: block; padding: 5px 10px; border-radius: inherit;'>Excluir</a>
      </td>";


        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não há dados na tabela.";
}

// Fecha a conexão
$conn->close();
?>

</div>
    </div>
    </main>
    <footer>
    </footer>
    <script>

    </script>

    <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
