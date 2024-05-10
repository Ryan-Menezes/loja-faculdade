<?php require_once __DIR__ . '/includes/site/header.php'; ?>

<?php require_once __DIR__ . '/includes/site/navbar.php'; ?>

<?php 
    $slug = filter_input(INPUT_GET, 'slug');
    $produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos WHERE slug = ? LIMIT 1', [$slug]);

    if (count($produtos) === 0) {
        redirect('/');
    }

    $produto = $produtos[0];
?>

<main class="product-page">
    <?php if ($produto->imagem): ?>
        <img src="<?= url('assets/uploads/' . $produto->imagem) ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">
    <?php else: ?>
        <img src="<?= url('assets/default-product.webp') ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">
    <?php endif; ?>

    <div>
        <h1><?= $produto->nome ?></h1>

        <p class="price">R$ <?= number_format($produto->preco, 2, ',', '.') ?></p>

        <p><?= $produto->descricao ?></p>
    
        <a href="" class="btn-add-to-cart">Adicionar ao Carrinho</a>
    </div>
</main>

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
