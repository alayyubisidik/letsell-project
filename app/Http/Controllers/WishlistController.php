<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function showWishlist (){

        $wishlists = Wishlist::where('user_id', Auth::user()->id)
        ->with('product.productImages')->with('product.category')->with('product.store')->get();
        // dd($wishlists[0]->product->productImages[0]->image);
        // dd(session('store'));

        return view('wishlist.index', [
            'wishlists' => $wishlists
        ]);
    }

    public function submitWishlist ($product_id){

        $wishlist = Wishlist::find($product_id);

        if($wishlist){
            return redirect()->back()->with('message-error', 'The product has been added to the wishlist previously');
        }

        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product_id
        ]);

        return redirect()->back()->with('message-success', 'The product has been successfully added to the wishlist');
    }

    public function deleteWishlist ($wishlist_id){

        $wishlist = Wishlist::where('id', $wishlist_id)->first();
        $wishlist->delete();

        return redirect()->back()->with('message-success', 'The product has been deleted');
    }
}
