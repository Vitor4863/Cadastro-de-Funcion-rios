<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
    <title>Organização de Notebooks para Empréstimo</title>
</head>
<body>

    <header>
        <div class="logo-container">
            <a href="modelo.php" id="logo"><img src="../img/logo-removebg-preview.png" alt=""></a>
        </div>
        <button id="openMenu">&#9776;</button>
        <nav id="menu">
            <button id="closeMenu">X</button>
            
            <span><?php
            if (!empty($_SESSION['id'])) {
                echo "<div style='color: white; font-family: Arial; background-color: black; padding: 10px; border-radius: 10px;'>";
                echo "Olá " . $_SESSION['nome'] . ", Bem-vindo <br>";
                echo "<a href='../Login/index.php'>Sair</a>";
                echo "</div>";
            } else {
                $_SESSION['msg'] = "Área restrita";
                header("Location: login.php");	
            }
            ?></span>
        </nav>
    </header>

    <aside>
        <center>
            <h2>Gerenciar Notebooks</h2>
            <form action="../dao/Funcionarios.php" method="POST" id="notebookForm">
                <label for="notebookName">Nome do Notebook:</label>
                <input type="text" id="notebookName" name="nome_notebook" required placeholder="Nome do Notebook">
                
                <label for="notebookCode">Serial:</label>
                <input type="text" id="Serial" name="serial" required placeholder="Serial">

                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Disponível">Disponível</option>
                    <option value="Emprestado">Emprestado</option>
                    <option value="Reservado">Reservado]</option>
                </select>
                
                <label for="location">Localização:</label>
                <select id="location" name="localizacao" required>
                    <option value="RH">RH</option>
                    <option value="Indicadores">Indicadores</option>
                    <option value="CPD">CPD</option>
                    <option value="Juridico">Juridico</option>
                    <option value="TI">TI</option>
                    <option value="Diretoria">Diretoria</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Compras">Compras</option>

                    
                </select>
                <label for="location">Nome do Cliente:</label>
                <input type="text" id="nome-usuario" name="nome_usuario" required placeholder="Nome do Usuario">
                <button type="submit">Cadastrar Notebook</button>
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

// Realiza a consulta SQL para obter os dados da tabela notebooks
$sql = "SELECT * FROM notebooks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os dados em uma tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome do Notebook</th><th>Serial</th><th>Status</th><th>Localização</th><th>Usuario</th><th>Editar</th><th>Excluir</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome_notebook"] . "</td>";
        echo "<td>" . $row["serial"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["localizacao"] . "</td>";
        echo "<td>" . $row["nome_usuario"] . "</td>";
        echo "<td>
        <a href='../editar/editar_notebook.php?id=" . $row['id'] . "' style='color: #00008b; text-decoration: none; display: block; padding: 5px 10px; border-radius: inherit;'>
            <img src='../img/editar-arquivo.png' alt='Editar' style='vertical-align: middle; margin-right: 5px; width: 50px; height: 50px;'> 
        </a>
      </td>";
      echo "<td style=''>
      <a href='../excluir/excluir_notebook.php?id=" . $row['id'] . "' style='color: #Ff4040; text-decoration: none; display: block; padding: 5px 10px; border-radius: inherit;'>
          <img src='../img/excluir.png' alt='Excluir' style='vertical-align: middle; margin-right: 5px; width: 50px; height: 50px;'> 
      </a>
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
    </main>
    <footer>
    </footer>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
