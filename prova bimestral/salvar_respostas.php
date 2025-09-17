<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $respostas = $_POST['respostas'];

    // 1. Inserir usuário
    $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // 2. Inserir respostas
    foreach ($respostas as $question_id => $value) {
        if (is_array($value)) {
            // Caso da pergunta de múltiplas escolhas ("Quem foi o melhor?")
            foreach ($value as $option_id) {
                $stmt = $conn->prepare("INSERT INTO answers (user_id, question_id, option_id) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $user_id, $question_id, $option_id);
                $stmt->execute();
            }
        } else {
            // Perguntas Sim/Não
            $option_id = intval($value);
            $stmt = $conn->prepare("INSERT INTO answers (user_id, question_id, option_id) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $question_id, $option_id);
            $stmt->execute();
        }
    }

    echo "<h2>Obrigado por responder o quiz!</h2>";
} else {
    echo "Acesso inválido.";
}
?>