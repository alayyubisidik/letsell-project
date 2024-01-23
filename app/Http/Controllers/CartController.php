<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart(){

        $cart = Cart::where('user_id', Auth::user()->id)
        ->with('cartItems.product.productImages')
        ->with(['cartItems.product.store']) // Menambahkan relasi store ke dalam eager loading
        ->first();
        // dd($cart->cartItems[0]->product->store->name);

        // dd($cart);
        if ($cart) {
            // Mendapatkan semua cart_item dari cart berserta data produk
            $cartItems = $cart->cartItems;

            // Sekarang, $cartItems akan berisi koleksi cart_item berserta data produk yang terkait
            return view('cart.index', ['cartItems' => $cartItems]);
        } else {
            // Handle ketika keranjang tidak ditemukan
            return view('cart.index', ['cartItems' => []]);
        }
    }

    public function addToCart(Request $request){
        $product_id = intval($request->product_id);
        $quantity = intval($request->quantity);

        $product = Product::find($product_id);
        if (!$product || $product->stock < $quantity) {
            // Produk tidak ditemukan atau stok tidak mencukupi
            return redirect()->back()->with('message-error', 'Product is out of stock or quantity exceeds stock');
        }

        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if(!$cart){
            $cart = Cart::create([
                'user_id' => Auth::user()->id
            ]);
        }
        
        $existingCartItem = CartItem::where('cart_id', $cart->id)
        ->where('product_id', $product_id)
        ->first();
        
        if ($existingCartItem) {
            return redirect()->back()->with('message-error', 'Item already exists in the cart');
        }

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);
        
        return redirect()->back()->with('message-success', 'Add to cart successfully');
    }

    public function deleteCartItem($cartItemId){
        CartItem::Where('id', $cartItemId)->delete();

        return redirect()->back();
    }
}
