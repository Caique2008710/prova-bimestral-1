<?php
$host = 'localhost';
$usuario = 'root';
$senha = ''; 
$banco = 'quiz_sistemas';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

echo "Conexão OK com o banco: " . $banco . "<br>";

// Testa a consulta
$sql = "SELECT COUNT(*) as total FROM questions";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo "Total de perguntas: " . $row['total'];
} else {
    echo "Erro na query: " . $conn->error;
}

$conn->close();
?>

