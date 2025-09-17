<?php
// Ativar exibição de erros para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pega a página ou usa 'page1' como padrão
$page = $_GET['page'] ?? 'page1';

// Caminhos válidos para segurança
$allowed_pages = ['page1', 'page2', 'page3'];

if (!in_array($page, $allowed_pages)) {
    $page = '404';
}

require_once 'includes/functions.php';

include 'includes/header.php';
include 'includes/navbar.php';

echo '<div class="container mt-4">';
if ($page === '404') {
    echo '<div class="alert alert-danger">Página não encontrada!</div>';
} else {
    include "pages/{$page}.php";
}
echo '</div>';

include 'includes/footer.php';