<?php

// https://docs.stripe.com/api/checkout/sessions/create

require_once __DIR__ . '/config/config.php';

use Src\Checkout;

$checkout = new Checkout(STRIPE_SECRET_KEY);

$checkout->payment();
