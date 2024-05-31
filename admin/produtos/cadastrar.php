<?php

require_once __DIR__ . '/../../config/config.php';

use Src\Database;

redirectIfIsNotAuthenticated();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$imagem = null;

if (empty($nome) || empty($preco) || empty($quantidade) || empty($descricao)) {
    redirect('admin/produtos/novo.php', [
        'error' => 'Preencha todos os campos',
    ]);
}

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
    $imagem = upload('imagem', '/produtos');
}

$result = Database::EXECUTE_NON_QUERY('INSERT INTO produtos (nome, slug, preco, quantidade, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?)',[
    $nome,
    slugify($nome),
    $preco,
    $quantidade,
    $descricao,
    $imagem,
]);

if (!$result) {
    redirect('admin/produtos/novo.php', [
        'error' => 'Erro ao cadastrar produto',
    ]);
}

redirect('admin/produtos/novo.php', [
    'success' => 'Produto cadastrado com sucesso',
]);
