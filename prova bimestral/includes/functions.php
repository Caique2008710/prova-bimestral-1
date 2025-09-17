<?php
// Função para escapar HTML
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}