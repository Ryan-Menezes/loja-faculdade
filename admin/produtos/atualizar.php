<?php

require_once __DIR__ . '/../../config/config.php';

redirectIfIsNotAuthenticated();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) redirect('admin/produtos');

$produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos WHERE id = ' . $id . ' LIMIT 1');
$produto = $produtos[0] ?? null;

if (!$produto) redirect('admin/produtos');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$imagem = $produto->imagem;

if (empty($nome) || empty($preco) || empty($quantidade) || empty($descricao)) {
    redirect('admin/produtos/editar.php?id=' . $id, [
        'error' => 'Preencha todos os campos',
    ]);
}

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
    $imagem = upload('imagem', '/produtos');
    deleteFile($produto->imagem ?? '');
}

$result = Database::EXECUTE_NON_QUERY('UPDATE produtos SET nome = ?, slug = ?, preco = ?, quantidade = ?, descricao = ?, imagem = ? WHERE id = ' . $id . ' LIMIT 1',[
    $nome,
    slugify($nome),
    $preco,
    $quantidade,
    $descricao,
    $imagem,
]);

if (!$result) {
    redirect('admin/produtos/editar.php?id=' . $id, [
        'error' => 'Erro ao editar produto',
    ]);
}

redirect('admin/produtos/editar.php?id=' . $id, [
    'success' => 'Produto editado com sucesso',
]);
