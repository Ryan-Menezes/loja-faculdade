<?php

class Cart {
    private array $items;

    private const CART_KEY = 'cart';

    public function __construct()
    {
        if (!isset($_SESSION) || !isset($_SESSION[self::CART_KEY])) {
            $this->items = [];
            return;
        }

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

    public function add(int $productId, int $quantity)
    {
        $this->items[$productId] = new CartItem($productId, $quantity);
        $this->saveCartItemsSession();
    }

    public function remove(int $productId)
    {
        array_slice($this->items, $productId, 1);
        $this->saveCartItemsSession();
    }

    public function clear()
    {
        $this->items = [];
        $this->saveCartItemsSession();
    }

    public function getItems(): array
    {
        $ids = implode(',', $this->getProductIds());

        $products = Database::EXECUTE_QUERY("SELECT id, nome, slug, preco, imagem FROM produtos WHERE id IN ({$ids})");

        $products = array_map(function ($product) {
            $product->quantity = $this->items[$product->id]->getQuantity();
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