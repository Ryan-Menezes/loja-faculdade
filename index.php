<?php require_once __DIR__ . '/includes/site/header.php'; ?>

<?php require_once __DIR__ . '/includes/site/banner.php'; ?>

<?php $produtos = Database::EXECUTE_QUERY('SELECT * FROM produtos LIMIT 4'); ?>

<!-- INICIO DAS CATEGORIAS EM DESTAQUE STRIDE.COM.BR -->
<div class="categorias">
    <!-- INICIO CORPO CATEGORIAS EM DESTAQUE STRIDE.COM.BR -->
        <div class="corpo-categorias">
            <!-- INICIO LINHA DO CORPO CATEGORIAS EM DESTAQUE STRIDE.COM.BR  -->
            <div class="linha">
                <div class="col-3">
                    <img src="assets/img/promocao-1.webp" alt="">
                </div>
                <div class="col-3">
                    <img src="assets/img/logo-promocao-2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="assets/img/promocao-3.jpg" alt="">
                </div>
            </div>
            <!-- FIM LINHA DO CORPO CATEGORIAS EM DESTAQUE STRIDE.COM.BR  -->
        </div>
    <!-- FIM CORPO CATEGORIAS EM DESTAQUE STRIDE.COM.BR -->
</div>
<!-- FIM DAS CATEGORIAS EM DESTAQUE STRIDE.COM.BR -->

<!-- INICIO PRODUTOS EM DESTAQUE STRIDE.COM.BR -->
<div class="corpo-categorias">
    <h2 class="titulo">Nossos Produtos</h2>
    <div class="linha">
        <?php foreach ($produtos as $produto): ?>
            <?php require __DIR__ . '/includes/site/card.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- FIM PRODUTOS EM DESTAQUE STRIDE.COM.BR -->

<!-- INICIO OFERTAS STRIDE.COM.BR -->
<div class="ofertas">
    <div class="corpo-categorias">
        <div class="linha">
            <div class="col-2">
                <img src="assets/img/adidas.png" alt="" class="oferta-img">
            </div>

            <div class="col-2">
                <p>Últimas unidades da loja STRIDE</p>
                <h1>Não Perca!</h1>
                <small>A verdadeira magia do Tênis "Adidas Samba" reside na sua versatilidade. Seja para um dia casual na cidade, uma noite animada com amigos, ou até mesmo um passeio descontraído no parque, este tênis se adapta com facilidade a qualquer ocasião, elevando instantaneamente o seu visual.</small>
                <!-- <br> <a href="" class="btn"></a> -->
            </div>
        </div>
    </div>
</div>
<!-- INICIO OFERTAS STRIDE.COM.BR -->

<!-- INICIO DEPOIMENTOS STRIDE.COM.BR -->
<div class="depoimentos">
    <div class="corpo-categorias">
        <div class="linha">
            <!-- INICIO DEPOIMENTOS STRIDE.COM.BR -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p>Muito boa essa loja, chegou tudo certinho!</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>

                <img src="assets/img/cliente-1.png" alt="">
                <h3>Bianca Stelim</h3>
            </div>
            <!-- FIM DEPOIMENTOS STRIDE.COM.BR -->
            <!-- INICIO DEPOIMENTOS STRIDE.COM.BR -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p>Fiz a compra de um tênis e chegou super rapido, gostei muito do produto suoer recomendo!</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>

                <img src="assets/img/cliente-2.png" alt="">
                <h3>Matheus Silva</h3>
            </div>
            <!-- FIM DEPOIMENTOS STRIDE.COM.BR -->
            <!-- INICIO DEPOIMENTOS STRIDE.COM.BR -->
            <div class="col-3">
                <ion-icon name="ribbon" class="depoimento-icone"></ion-icon>
                <p>Produtos de ótima qualidade, já comprei varias vezes na STRIDE e veio certinho!</p>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>

                <img src="assets/img/cliente-3.png" alt="">
                <h3>Franciele Gomes</h3>
            </div>
            <!-- FIM DEPOIMENTOS STRIDE.COM.BR -->
        </div>
    </div>
</div>
<!-- FIM DEPOIMENTOS STRIDE.COM.BR -->

<!-- INICIO MARCAS STRIDE.COM.BR -->
<div class="marcas">
    <div class="corpo-categorias">
        <div class="linha">
            <div class="col-5">
                <img src="assets/img/logo-puma.png" alt="">
            </div>
            <div class="col-5">
                <img src="assets/img/logo-vans.png" alt="">
            </div>
            <div class="col-5">
                <img src="assets/img/nike-logo-verde.png" alt="">
            </div>
            <div class="col-5">
                <img src="assets/img/logo-adidas.png" alt="">
            </div>

        </div>
    </div>
</div>
<!-- FIM MARCAS STRIDE.COM.BR -->

<?php require_once __DIR__ . '/includes/site/footer.php'; ?>
