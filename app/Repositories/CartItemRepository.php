<?php
namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository
{
    protected $model;
    public function __construct(CartItem $model)
    {
        $this->model = $model;
    }
    // public function create($data)
    // {
    //     return CartItem::create($data);
    // }

    // public function update($item, $data)
    // {
    //     $item->update($data);

    //     return $item;
    // }
    // Find a cart item by cart ID and product ID
    public function findCartItem($cartId, $productId)
    {
        return $this->model
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();
    }

    // Find a cart item by its ID
    public function find($id)
    {
        return $this->model->find($id);
    }

    // Clear all cart items for a specified cart
    public function clearCart($cartId)
    {
        $this->model
            ->where('cart_id', $cartId)
            ->delete();
    }

    // Get all cart items for a specified cart
    public function getCartItems($cartId)
    {
        return $this->model
            ->where('cart_id', $cartId)
            ->get();
    }

    // Create a new cart item
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update a cart item
    public function update($model, array $data)
    {
        $model->update($data);
        return $model;
    }

    // Delete a cart item
    public function delete($model)
    {
        $model->delete();
    }
}