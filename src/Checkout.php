<?php

namespace Src;

use Stripe\StripeClient;

class Checkout {
    private StripeClient $stripe;
    private Cart $cart;

    public function __construct(string $secretKey)
    {
        $this->stripe = new StripeClient($secretKey);
        $this->cart = new Cart();
    }

    public function payment()
    {
        $items = $this->cart->getItems();

        $line_items = [];

        foreach ($items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $item->nome,
                        'description' => $item->descricao,
                        'images' => [productImage($item)],
                    ],
                    "unit_amount" => $item->preco * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $checkout_session = $this->stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => url('carrinho.php?success=payment'),
            'cancel_url' => url('carrinho.php'),
        ]);

        header("Location: {$checkout_session->url}");
        die();
    }
}
