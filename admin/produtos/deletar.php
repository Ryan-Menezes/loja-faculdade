<?php

require_once __DIR__ . '/../../config/config.php';

use Src\Database;

redirectIfIsNotAuthenticated();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) redirect('admin/produtos');

$produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos WHERE id = ' . $id . ' LIMIT 1');
$produto = $produtos[0] ?? null;

if (!$produto) redirect('admin/produtos');

$result = Database::EXECUTE_NON_QUERY('DELETE FROM produtos WHERE id = ' . $id . ' LIMIT 1');

if (!$result) {
    redirect('admin/produtos', [
        'error' => 'Erro ao deletar produto',
    ]);
}

deleteFile($produto->imagem ?? '');

redirect('admin/produtos', [
    'success' => 'Produto deletado com sucesso',
]);
