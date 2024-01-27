<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Else_;

class StoreController extends Controller
{


    public function storePage(Request $request, $slug)
    {
        $store = Store::where('slug', $slug)
                        ->withCount('products')
                        ->with('banners')
                        ->first();

        // dd($store);

        // if ($store->subscription_expiry_date && now() > $store->subscription_expiry_date) {
        //     $request->session()->forget('store');

        //     $store->subscription_status = 0;
        //     $store->save();

        //     $request->session()->put('store', $store);
        // }

        return view('store.index', [
            "store" => $store
        ]);
    }

    public function createStore(Request $request)
    {

        if ($request->isMethod('GET')) {
            return view('store.create');
        } else {

            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'description' => 'required|string',
                'locate' => 'required|string|min:3|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('store-image', $imageName, 'public');

            $slug = Str::slug($request->input('name'), '-');

            $store = Store::create([
                'user_id' => Auth::user()->id,
                'name' => $request->input('name'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'locate' => $request->input('locate'),
                'image' => $imageName,
                "subscription_status" => 0,
            ]);

            $user = User::where('id', Auth::user()->id)->first();
            $user->role = "seller";
            $user->save();

            $request->session()->forget('store');
            $request->session()->put('store', $store);

            return redirect('/store/' . $store->slug);
        }
    }

    public function productPage(){
        return view('store.product');
    }

    // public function subscription(Request $request)
    // {
    //     $user = User::where('username', Auth::user()->username)->first();
    //     // dd(config('midtrans.server_key'));

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => rand(),
    //             'gross_amount' => 10000,
    //         ),
    //         'customer_details' => array(
    //             'name' => $user->name,
    //             'phone' => $user->contact,
    //         ),
    //     );

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);

    //     return view('store.subscription.index', [
    //         "user" => $user,
    //         "snaptoken" => $snapToken 
    //     ]);
        
    // }

}
