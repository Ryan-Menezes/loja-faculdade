<?php

require_once __DIR__ . '/../../includes/admin/header.php';

redirectIfIsNotAuthenticated();

?>

<div class="d-flex align-items-center justify-content-between pb-2 border-bottom my-5">
    <h1>Novo Produto</h1>

    <a href="<?= url('admin/produtos') ?>" class="btn border">
        <i class="bi bi-arrow-left-short"></i>
        Voltar
    </a>
</div>

<?php require_once __DIR__ . '/../../includes/messages.php'; ?>

<form method="POST" action="<?= url('admin/produtos/cadastrar.php') ?>" enctype="multipart/form-data" class="form p-5 border rounded bg-white">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required />
        </div>

        <div class="mb-3 col-md-6">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" />
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="preco" name="preco" required />
        </div>

        <div class="mb-3 col-md-6">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required />
        </div>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php require_once __DIR__ . '/../../includes/admin/footer.php'; ?>
