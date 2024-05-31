<?php

require_once __DIR__ . '/includes/site/header.php';

use Src\Cart;

$cart = new Cart();

if (isset($_GET['success'])) {
    $cart->clear();
}

$items = $cart->getItems();

?>

<?php require_once __DIR__ . '/includes/site/navbar.php'; ?>

<div class="carrinho">
    <?php if (!$cart->isEmpty()): ?>
        <div class="carrinho-table">
            <div class="carrinho-container">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço (R$)</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Subtotal (R$)</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($items as $item):
                        $total += $item->subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div>
                                        <img src="<?= productImage($item) ?>" alt="<?= $item->nome ?>" class="rounded border m-2" width="50" height="50">

                                        <a href="<?= url('produto.php?slug=' . $item->slug) ?>" title="<?= $item->nome ?>" target="_blank"><span><?= $item->nome ?></span></a>
                                    </div>
                                </td>
                                <td><?= number_format($item->preco, 2, ',', '.') ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= number_format($item->subtotal, 2, ',', '.') ?></td>
                                <td>
                                    <a href="<?= url('carrinho-remove.php?id=' . $item->id) ?>" onclick="return confirm('Deseja realmente remover esse item?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="carrinho-checkout">
            <div class="carrinho-container">
                <p><strong>TOTAL: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>

                <a href="<?= url('checkout.php') ?>" class="btn-add-to-cart">Checkout</a>
            </div>
        </div>
    <?php elseif (isset($_GET['success'])): ?>
        <div class="alert-cart">
            <p>Pagamento efetuado com sucesso, enviaremos um link para o seu email para você companhar o seu pedido</p>
            <a href="<?= url('produtos.php') ?>" class="btn-add-to-cart">Navegar na loja</a>
        </div>
    <?php else: ?>
        <div class="alert-cart">
            <p>O carrinho está vázio, adicione algum produto em nossa loja</p>
            <a href="<?= url('produtos.php') ?>" class="btn-add-to-cart">Navegar na loja</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
