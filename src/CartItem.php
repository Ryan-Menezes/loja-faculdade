<?php

namespace Src;

use JsonSerializable;

class CartItem implements JsonSerializable
{
    private int $productId;
    private int $quantity;

    public function __construct(int $productId, int $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function jsonSerialize(): mixed {
        return [
            'productId' => $this->productId,
            'quantity' => $this->quantity,
        ];
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function addQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }
}
