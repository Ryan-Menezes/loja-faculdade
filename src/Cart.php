<?php

namespace Src;

class Cart {
    private array $items;

    private const CART_KEY = 'cart';

    public function __construct()
    {
        $this->items = [];

        if (!isset($_SESSION) || !isset($_SESSION[self::CART_KEY])) return;

        $items = json_decode($_SESSION[self::CART_KEY]);

        foreach ($items as $item) {
            $this->items[$item->productId] = new CartItem($item->productId, $item->quantity);
        }

        $this->saveCartItemsSession();
    }

    private function saveCartItemsSession()
    {
        $_SESSION[self::CART_KEY] = json_encode($this->items);
    }

    public function add(int $productId, int|null $quantity = null)
    {
        if (is_null($quantity) && isset($this->items[$productId])) {
            $this->items[$productId]->addQuantity(1);

        } else {
            $this->items[$productId] = new CartItem($productId, $quantity ?? 1);
        }

        $this->saveCartItemsSession();
    }

    public function remove(int $productId)
    {
        unset($this->items[$productId]);
        $this->saveCartItemsSession();
    }

    public function clear()
    {
        $this->items = [];
        $this->saveCartItemsSession();
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function getItems(): array
    {
        $ids = implode(',', $this->getProductIds());

        $products = Database::EXECUTE_QUERY("SELECT id, nome, descricao, slug, preco, imagem FROM produtos WHERE id IN ({$ids})");

        $products = array_map(function ($product) {
            $product->quantity = $this->items[$product->id]->getQuantity();
            $product->subtotal = $product->preco * $product->quantity;
            return $product;
        }, $products);

        return $products;
    }

    private function getProductIds(): array
    {
        $ids = [];

        foreach ($this->items as $item) {
            $ids[] = $item->getProductId();
        }

        return $ids;
    }
}
