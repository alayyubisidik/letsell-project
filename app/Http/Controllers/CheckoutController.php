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
        if(!$request->selected_items){
            return redirect()->back();
        }
    
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
    
            // Pengecekan stok mencukupi
            if ($cartItem->quantity > $cartItem->product->stock) {
                return redirect()->back()->with('message-error', 'Insufficient stock for product: ' . $cartItem->product->name);
            }
        }
    
        // Buat entri baru dalam tabel 'orders'
        $order = new Order();
        $order->total = $totalOrder;
        $order->user_id = Auth::user()->id;
        $order->store_id = $firstStoreId;
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
    
        }
    
        // Query ulang untuk mendapatkan data yang baru saja disimpan
        $newOrder = Order::with(['orderItems.product.productImages', 'orderItems.product.store'])
            ->where('id', $order->id)
            ->first();
    
        return view('checkout.index', ['order' => $newOrder]);
    }
    
    
    public function submitCheckout(Request $request){  

        // dd($request->all());
        $order = Order::where('id', $request->order_id)->first();
        $order->delivery_address = $request->delivery_address;
        $order->status = "unpaid";
        $order->save();


        return redirect('/purchase');

    }



}
 