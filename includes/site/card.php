<!-- INICIO ITEM PRODUTO EM DESTAQUE STRIDE.COM.BR -->
<a href="<?= url('/produto.php?slug=' . $produto->slug) ?>" class="col-4">
    <img src="<?= productImage($produto) ?>" alt="<?= $produto->nome ?>" class="rounded border m-2">

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
