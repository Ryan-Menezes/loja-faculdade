<!-- INICIO ITEM PRODUTO EM DESTAQUE STRIDE.COM.BR -->
<a href="/produto.php?slug=<?= $produto->slug ?>" class="col-4">
    <?php if ($produto->imagem): ?>
        <img src="<?= url('assets/uploads/' . $produto->imagem) ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">
    <?php else: ?>
        <img src="<?= url('assets/default-product.webp') ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">
    <?php endif; ?>

    <h4><?= $produto->nome ?></h4>

    <div class="classificacao">
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
    </div>

    <p>R$ <?= number_format($produto->preco, 2, ',', '.') ?></p>
</a>
<!-- FIM ITEM PRODUTO EM DESTAQUE STRIDE.COM.BR -->