<?php require_once __DIR__ . '/includes/site/header.php'; ?>

<?php require_once __DIR__ . '/includes/site/navbar.php'; ?>

<?php

use Src\Database;

$produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos');

?>

<div class="corpo-categorias" style="margin: 40px auto">
    <div class="linha">
        <?php foreach ($produtos as $produto): ?>
            <?php require __DIR__ . '/includes/site/card.php'; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
