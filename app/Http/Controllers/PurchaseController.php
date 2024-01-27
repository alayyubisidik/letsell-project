<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function showPurchase() {
        $userId = Auth::user()->id;
    
        $purchases = Order::where('user_id', $userId)
            ->with('orderItems.product.productImages')
            ->with(['orderItems.product.store'])
            ->whereNotIn('status', ['unorder'])
            ->get();
        
        foreach ($purchases as $purchase) {
            $createdAt = Carbon::parse($purchase->created_at);
            $timeoutMinutes = 1440;
    
            // Jika pesanan belum dibayar dan sudah lebih dari 5 menit, ubah status menjadi 'canceled'
            if ($createdAt->addMinutes($timeoutMinutes)->isPast()) {
                $purchase->status = 'canceled';
                $purchase->save();
            }
        }
    
        return view('purchase.index', ['purchases' => $purchases]);
    }
     

    public function cancelOrder (Request $request) {

        $order = Order::where('id', $request->order_id)->first();
        $order->status = "canceled";
        $order->save();
        return redirect()->back();
    }
}
