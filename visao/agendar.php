<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Notebook</title>
    <link rel="stylesheet" href="../cadastro/estilo3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/phosphor-icons"></script>
    <style>
        
        /* Estilo para o rótulo (label) */
label[for="localizacao"] {
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
}

/* Estilo para o campo select */
select {
    background-color: #f1f1f1;
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 12px 15px;
    margin-bottom: 20px;
    width: 100%;
    font-size: 16px;
    color: #333;
    appearance: none; /* Remove a seta padrão do select */
    -webkit-appearance: none; /* Remove a seta padrão do select no Chrome */
    -moz-appearance: none; /* Remove a seta padrão do select no Firefox */
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns%3D%22http%3A//www.w3.org/2000/svg%22 width%3D%2210%22 height%3D%225%22 viewBox%3D%220 0 10 5%22%3E%3Cpath fill%3D%22%23333%22 d%3D%22M0 0l5 5 5-5z%22/%3E%3C/svg%3E'); /* Seta customizada */
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 10px 5px;
}

/* Estilo para a lista de opções do select */
#localizacao option {
    padding: 10px;
}
button{
    background: green;
}


/* Ajuste do select em dispositivos móveis */
@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
    #localizacao {
        font-size: 20px;
        padding: 15px;
    }
}

    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container log-in-container">
            <form action="../dao/processar_agendamento.php" method="POST">
                <img src="../img/logo-removebg-preview.png" alt="Logo">
                <br><br>
                <label for="nome_cliente">Nome do Cliente</label>
                <input type="text" id="nome_cliente" name="nome_cliente" placeholder="Digite seu nome" required>

                <label for="nome_notebook">Nome do Notebook</label>
                <select id="nome_notebook" name="nome_notebook" required>
                    <option value="">Selecione um notebook</option>
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

                    // Consulta os notebooks disponíveis
                    $sql = "SELECT nome_notebook FROM notebooks WHERE status = 'Disponível'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["nome_notebook"] . "'>" . $row["nome_notebook"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum notebook disponível</option>";
                    }

                    $conn->close();
                    ?>
                </select>

                <label for="data_agendamento">Data de Agendamento</label>
                <input type="datetime-local" id="data_agendamento" name="data_agendamento" required>

                <label for="localizacao">Localização</label>
                <select id="localizacao" name="localizacao" required>
                    <option value="RH">RH</option>
                    <option value="Indicadores">Indicadores</option>
                    <option value="CPD">CPD</option>
                    <option value="Juridico">Juridico</option>
                    <option value="TI">TI</option>
                    <option value="Diretoria">Diretoria</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Compras">Compras</option>
                    <option value="Manutenção">Manutenção</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Contabilidade">Contabilidade</option>
                    <option value="Price">Price</option>
                    <option value="Auditoria">Auditoria</option>
                    <option value="Tesouraria">Tesouraria</option>
                </select>

                <button type="submit">Agendar Notebook</button>
            </form>
        </div>
    </div>
    <script src="./main.js"></script>
</body>
</html>
