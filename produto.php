<?php require_once __DIR__ . '/includes/site/header.php'; ?>

<?php require_once __DIR__ . '/includes/site/navbar.php'; ?>

<?php
    use Src\Database;

    $slug = filter_input(INPUT_GET, 'slug');
    $produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos WHERE slug = ? LIMIT 1', [$slug]);

    if (count($produtos) === 0) {
        redirect('/');
    }

    $produto = $produtos[0];
?>

<main class="product-page">
    <img src="<?= productImage($produto) ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">

    <div>
        <h1><?= $produto->nome ?></h1>

        <p class="price">R$ <?= number_format($produto->preco, 2, ',', '.') ?></p>

        <p><?= $produto->descricao ?></p>

        <a href="<?= url('carrinho-add.php?id=' . $produto->id) ?>" class="btn-add-to-cart">Adicionar ao Carrinho</a>
    </div>
</main>

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
