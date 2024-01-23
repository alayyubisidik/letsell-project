<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showCheckout(Request $request){
        // Dapatkan array 'id' dari 'selected_items' dalam request
        $selectedItems = $request->input('selected_items');
        $itemIds = [];
    
        foreach ($selectedItems as $selectedItem) {
            $itemId = $selectedItem['id'];
            $itemIds[] = $itemId;
        }
    
        // Ambil data dari 'CartItem' atau 'Product' berdasarkan 'id' yang ada
        $cartItems = CartItem::whereIn('id', $itemIds)->get();
    
        // Cek apakah semua produk berasal dari toko yang sama
        $firstStoreId = $cartItems->first()->product->store_id;
    
        if (!$cartItems->every(function ($item) use ($firstStoreId) {
            return $item->product->store_id === $firstStoreId;
        })) {
            // Jika tidak, berikan respon atau tindakan sesuai kebutuhan aplikasi Anda
            return redirect()->back()->with('message-error', 'All products must be from the same store.');
        }
    
        // Hitung total pesanan berdasarkan harga dan kuantitas
        $totalOrder = 0;
    
        foreach ($cartItems as $cartItem) {
            $totalOrder += $cartItem->quantity * $cartItem->product->price;
        }
    
        // Buat entri baru dalam tabel 'orders'
        $order = new Order();
        $order->total = $totalOrder;
        $order->user_id = Auth::user()->id;
        $order->status = "unorder";
        $order->save();
    
        // Loop melalui setiap item dalam 'selected_items' dan tambahkan ke tabel 'order_items'
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->subtotal = $cartItem->product->price * $cartItem->quantity;
            $orderItem->save();

            $product = $cartItem->product;
            $product->stock -= $cartItem->quantity;
            $product->save();
        }
    
        // Query ulang untuk mendapatkan data yang baru saja disimpan
        $newOrder = Order::with(['orderItems.product.productImages', 'orderItems.product.store'])
            ->where('id', $order->id)
            ->first();
    
        return view('checkout.index', ['order' => $newOrder]);
    }
    
    
    public function submitCheckout(Request $request){
        $order = Order::where('id', $request->order_id)->first();
        $order->place_of_payment = $request->place_of_payment;
        $order->status = "unpaid";
        $order->save();


        return redirect('/');

    }



}
