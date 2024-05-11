<?php

require_once __DIR__ . '/includes/site/header.php';

$cart = new Cart();

?>

<?php require_once __DIR__ . '/includes/site/navbar.php'; ?>

<?php $produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos'); ?>

<h1>Carrinho</h1>

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
