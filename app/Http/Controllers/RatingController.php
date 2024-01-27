<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function showRating(Request $request){

        $product = Product::where('id', $request->product_id)->with('productImages')->with('store')->first();

        return view('rating.index', [
            'product' => $product
        ]);
    }

    public function submitRating(Request $request){

        // dd($request->all());

        $orderItem = OrderItem::where('id', $request->order_item_id)->first();
        // dd($orderItem);
        $orderItem->is_rated = 1;
        $orderItem->save();

        Rating::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect('/purchase');
    }
}
