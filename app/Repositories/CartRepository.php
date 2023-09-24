<?php
namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function create($data)
    {
        return Cart::create($data);
    }

    public function update($cart, $data)
    {
        $cart->update($data);

        return $cart;
    }

    public function find($id)
    {
        return Cart::find($id);
    }
}