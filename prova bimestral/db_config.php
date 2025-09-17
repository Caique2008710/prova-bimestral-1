<?php
$host = 'localhost';
$usuario = 'root';
$senha = ''; // coloque aqui a senha do MySQL se tiver
$banco = 'quiz_sistemas';

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>