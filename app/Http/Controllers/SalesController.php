<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function showSales(){
    
        $storeId = session('store')->id;

        $sales = Order::whereNotIn('status', ['unorder'])
            ->where('store_id', $storeId)
            ->with('orderItems.product.productImages')
            ->with(['orderItems.product.store'])
            ->get();

        // dd($sales[0]->orderItems);

        return view('sales.index', ['sales' => $sales]);
    }

    public function confirmPayment(Request $request){
        $order = Order::where('id', $request->order_id)->with('orderItems.product')->first();
    
        // Cek apakah pesanan sudah dibayar sebelumnya
        if ($order->status === 'paid') {
            return redirect()->back()->with('message-error', 'Order has already been paid.');
        }
    
        // Loop melalui setiap item pesanan dan kurangi stok produk
        foreach ($order->orderItems as $orderItem) {
            $product = $orderItem->product;
            
            // Kurangi stok produk
            $product->stock -= $orderItem->quantity;
            $product->save();
        }
    
        // Update status pesanan menjadi 'paid'
        $order->status = 'paid';
        $order->save();
    
        return redirect()->back()->with('message-success', 'Payment confirmed successfully.');
    }
    
}
