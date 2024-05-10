<?php require_once __DIR__ . '/../../includes/admin/header.php'; ?>

<?php $produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos'); ?>

<div class="d-flex align-items-center justify-content-between pb-2 border-bottom my-5">
    <h1>Produtos</h1>

    <a href="<?= url('admin/produtos/novo.php') ?>" class="btn border">
        Novo
        <i class="bi bi-plus-circle-fill"></i>
    </a>
</div>

<?php require_once __DIR__ . '/../../includes/messages.php'; ?>

<table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Produto</th>
            <th scope="col">Preço (R$)</th>
            <th scope="col">Quantidade</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?= $produto->id ?></td>
            <td>
                <?php if ($produto->imagem): ?>
                    <img src="<?= url('assets/uploads/' . $produto->imagem) ?>" alt="<?= $produto->nome ?>" width="50" height="50" class="rounded border m-2">
                <?php else: ?>
                    <img src="<?= url('assets/default-product.webp') ?>" alt="<?= $produto->nome ?>" height="50" class="rounded border m-2">
                <?php endif; ?>

                <span><?= $produto->nome ?></span>
            </td>
            <td><?= number_format($produto->preco, 2, ',', '.') ?></td>
            <td><?= $produto->quantidade ?></td>
            <td>
                <a href="<?= url('admin/produtos/editar.php?id=' . $produto->id) ?>" class="btn btn-sm btn-primary">
                    <i class="bi bi-pen-fill"></i>
                </a>
                <a href="<?= url('admin/produtos/deletar.php?id=' . $produto->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente deletar esse produto?')">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/admin/footer.php'; ?>
