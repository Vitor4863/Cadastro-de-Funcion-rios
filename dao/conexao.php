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

// Agora a conexão está estabelecida e pronta para ser utilizada para realizar consultas e operações no banco de dados
?>
