<?php
session_start();

$nome_cliente = $_POST['nome_cliente'];
$nome_notebook = $_POST['nome_notebook'];
$data_agendamento = $_POST['data_agendamento'];
$localizacao = $_POST['localizacao'];

// Conexão com o banco de dados
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

// Insere o agendamento na tabela de agendamentos
$sql_agendamento = "INSERT INTO agendamentos (nome_cliente, nome_notebook, data_agendamento, localizacao) 
                    VALUES ('$nome_cliente', '$nome_notebook', '$data_agendamento', '$localizacao')";

if ($conn->query($sql_agendamento) === TRUE) {
    // Atualiza o status do notebook para Reservado
    $sql_atualizar_notebook = "UPDATE notebooks SET status = 'Reservado', localizacao = '$localizacao', nome_usuario = '$nome_cliente' 
                               WHERE nome_notebook = '$nome_notebook'";

    if ($conn->query($sql_atualizar_notebook) === TRUE) {
        echo "Agendamento realizado com sucesso. O notebook foi reservado.";
    } else {
        echo "Erro ao atualizar o status do notebook: " . $conn->error;
    }
} else {
    echo "Erro ao inserir o agendamento: " . $conn->error;
}

$conn->close();
?>
