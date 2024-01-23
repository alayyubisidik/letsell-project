<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function showPurchase () {
        $purchases = Order::where('user_id', Auth::user()->id)
        ->with('orderItems.product.productImages')
        ->with(['orderItems.product.store'])
        ->whereNotIn('status', ['unorder'])
        ->get();


        // dd($purchases[0]->orderItems[0]->product->productImages[0]->image);
        return view('purchase.index', ['purchases' => $purchases]);
    }
}
 