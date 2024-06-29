<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para buscar todos os agendamentos
$sql = "SELECT nome_cliente, nome_notebook, data_agendamento, localizacao FROM agendamentos";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda do T.I.</title>
    <link rel="stylesheet" href="../cadastro/estilo3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/phosphor-icons"></script>
    <style>
        .agenda-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
            background-color: #f9f9f9;
        }

        .agenda-item {
            margin-bottom: 10px;
        }

        .agenda-item label {
            font-weight: bold;
        }

        .agenda-item span {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="agenda-container">
        <h2>Agendamentos de Notebook</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="agenda-item">
                    <label>Nome do Cliente:</label>
                    <span><?php echo $row['nome_cliente']; ?></span>
                </div>
                <div class="agenda-item">
                    <label>Nome do Notebook:</label>
                    <span><?php echo $row['nome_notebook']; ?></span>
                </div>
                <div class="agenda-item">
                    <label>Data de Agendamento:</label>
                    <span><?php echo $row['data_agendamento']; ?></span>
                </div>
                <div class="agenda-item">
                    <label>Localização:</label>
                    <span><?php echo $row['localizacao']; ?></span>
                </div>
                <hr>
                <?php
            }
        } else {
            echo "<p>Nenhum agendamento encontrado.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
