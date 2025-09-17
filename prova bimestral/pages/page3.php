<h1>Quiz - Desenvolvimento de Sistemas</h1>

<?php
$perguntas_logica = [
    "Sabe o que é lógica de programação?",
    "Já programou em alguma linguagem antes?",
    "Sabe o que é uma variável?",
    "Conhece o que é um banco de dados?",
    "Já ouviu falar em front-end e back-end?",
    "Sabe o que é HTML?",
    "Consegue identificar um erro no código quando ele ocorre?",
    "Já usou algum ambiente de desenvolvimento como VS Code?"
];

$perguntas_alunos = [
    "Vai continuar na profissão?",
    "Vai fazer faculdade?",
    "Estou formando, vou fazer curso.",
    "Vai parar o curso?"
];

$melhores = [
    "Clevinton",
    "Allison",
    "Monica / Jesus",
    "Alexandre",
    "Jesus"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erro = false;
    $respostas = [];

    if (!isset($_POST['melhor']) || !is_array($_POST['melhor']) || count($_POST['melhor']) == 0) {
        $erro = true;
        echo '<div class="alert alert-danger">Por favor, selecione pelo menos quem foi o melhor.</div>';
    } else {
        $respostas['melhor'] = $_POST['melhor'];
    }

    foreach ($perguntas_logica as $i => $p) {
        $key = "pergunta_" . ($i + 1);
        if (!isset($_POST[$key]) || !in_array($_POST[$key], ['Sim', 'Não'])) {
            $erro = true;
            echo "<div class='alert alert-danger'>Responda todas as perguntas da seção lógica.</div>";
            break;
        } else {
            $respostas[$key] = $_POST[$key];
        }
    }

    foreach ($perguntas_alunos as $i => $p) {
        $key = "extra_" . ($i + 1);
        if (!isset($_POST[$key]) || !in_array($_POST[$key], ['Sim', 'Não'])) {
            $erro = true;
            echo "<div class='alert alert-danger'>Responda todas as perguntas extras para alunos.</div>";
            break;
        } else {
            $respostas[$key] = $_POST[$key];
        }
    }

    if (!$erro) {
        echo '<div class="alert alert-success">Quiz enviado com sucesso! Aqui estão suas respostas:</div>';

        echo "<h4>Quem foi o melhor?</h4><ul>";
        foreach ($respostas['melhor'] as $m) {
            echo "<li>" . e($m) . "</li>";
        }
        echo "</ul>";

        echo "<h4>Perguntas de lógica:</h4><ul>";
        foreach ($perguntas_logica as $i => $p) {
            $key = "pergunta_" . ($i + 1);
            echo "<li><strong>" . e($p) . "</strong>: " . e($respostas[$key]) . "</li>";
        }
        echo "</ul>";

        echo "<h4>Perguntas extras para alunos:</h4><ul>";
        foreach ($perguntas_alunos as $i => $p) {
            $key = "extra_" . ($i + 1);
            echo "<li><strong>" . e($p) . "</strong>: " . e($respostas[$key]) . "</li>";
        }
        echo "</ul>";
    }
}
?>

<form method="post" class="mt-4">

    <h3>Quem foi o melhor? (marque um ou mais)</h3>
    <div class="mb-3">
        <?php foreach ($melhores as $m): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="melhor[]" id="melhor_<?= e($m) ?>" value="<?= e($m) ?>"
                    <?= (isset($_POST['melhor']) && in_array($m, $_POST['melhor'])) ? 'checked' : '' ?>>
                <label class="form-check-label" for="melhor_<?= e($m) ?>"><?= e($m) ?></label>
            </div>
        <?php endforeach; ?>
    </div>

    <h3>Perguntas (Sim ou Não)</h3>
    <?php foreach ($perguntas_logica as $i => $p): 
        $key = "pergunta_" . ($i + 1);
    ?>
        <div class="mb-3">
            <label class="form-label"><?= e($p) ?></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= e($key) ?>" id="<?= $key ?>_sim" value="Sim" required
                <?= (isset($_POST[$key]) && $_POST[$key] === 'Sim') ? 'checked' : '' ?>>
                <label class="form-check-label" for="<?= $key ?>_sim">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= e($key) ?>" id="<?= $key ?>_nao" value="Não" required
                <?= (isset($_POST[$key]) && $_POST[$key] === 'Não') ? 'checked' : '' ?>>
                <label class="form-check-label" for="<?= $key ?>_nao">Não</label>
            </div>
        </div>
    <?php endforeach; ?>

    <h3>Perguntas extras para alunos (Sim ou Não)</h3>
    <?php foreach ($perguntas_alunos as $i => $p): 
        $key = "extra_" . ($i + 1);
    ?>
        <div class="mb-3">
            <label class="form-label"><?= e($p) ?></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= e($key) ?>" id="<?= $key ?>_sim" value="Sim" required
                <?= (isset($_POST[$key]) && $_POST[$key] === 'Sim') ? 'checked' : '' ?>>
                <label class="form-check-label" for="<?= $key ?>_sim">Sim</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= e($key) ?>" id="<?= $key ?>_nao" value="Não" required
                <?= (isset($_POST[$key]) && $_POST[$key] === 'Não') ? 'checked' : '' ?>>
                <label class="form-check-label" for="<?= $key ?>_nao">Não</label>
            </div>
        </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-success">Enviar Quiz</button>
</form>
