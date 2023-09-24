<?php

namespace App\Http\Controllers;

use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CartController extends Controller
{
    protected $cartRepository;
    protected $cartItemRepository;

    public function __construct(CartRepository $cartRepository, CartItemRepository $cartItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function addToCart(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'cart_qty' => 'required|integer|min:1',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        $productId = $request->input('product_id');
        $cartQty = $request->input('cart_qty');
    
        // Check if the current user has a cart record
        $user = FacadesAuth::user();
        dd($user);
        $cartId = $user->cart->id ?? null;
    
        // If the user doesn't have a cart, create a new one
        if (!$cartId) {
            $cart = $this->cartRepository->create([
                'user_id' => $user->id,
                // Other cart data you may need to fill
            ]);
            $cartId = $cart->id;
        }
    
        // Check if the cart item already exists
        $cartItem = $this->cartItemRepository->findCartItem($cartId, $productId);
    
        if (!$cartItem) {
            // Create a new cart item
            $cartItem = $this->cartItemRepository->create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'cart_qty' => $cartQty,
            ]);
        } else {
            // Update the cart item quantity
            $this->cartItemRepository->update($cartItem, ['cart_qty' => $cartQty]);
        }
    
        return response()->json(['message' => 'Cart item added/updated successfully'], 200);
    }

    public function removeCartItem($id)
    {
        // Find the cart item by ID
        $cartItem = $this->cartItemRepository->find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        // Delete the cart item
        $this->cartItemRepository->delete($cartItem);

        return response()->json(['message' => 'Cart item removed successfully'], 200);
    }

    public function updateCartItem(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'cart_qty' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Find the cart item by ID
        $cartItem = $this->cartItemRepository->find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        // Update the cart item quantity
        $cartQty = $request->input('cart_qty');
        $this->cartItemRepository->update($cartItem, ['cart_qty' => $cartQty]);

        return response()->json(['message' => 'Cart item updated successfully'], 200);
    }

    public function clearCart($cartId)
    {
        // Clear all cart items for the specified cart
        $this->cartItemRepository->clearCart($cartId);

        return response()->json(['message' => 'Cart cleared successfully'], 200);
    }

    public function viewCart($cartId)
    {
        // Get all cart items for the specified cart
        $cartItems = $this->cartItemRepository->getCartItems($cartId);

        return response()->json(['cart_items' => $cartItems], 200);
    }
}
