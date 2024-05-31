<?php

require_once __DIR__ . '/config/config.php';

use Src\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $cart = new Cart();
    $cart->remove($id);
}

redirect('/carrinho.php');

?>
