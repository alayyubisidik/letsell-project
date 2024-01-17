<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardSellerController extends Controller
{
    public function index(){
        return view('store.dashboard-seller.index');
    }

    public function store(){

        $store = Store::where('user_id', Auth::user()->id)->with('banners')->first();
        // dd($store);
        return view('store.dashboard-seller.store.index', [
            'store' => $store
        ]);
    }
    
    public function storeEdit(Request $request, $slug){

        $store = Store::where('slug', $slug)->first();
        if($request->isMethod('GET')){
            return view('store.dashboard-seller.store.edit', [
                'store' => $store
            ]);

        }else{
            $request->validate([
                "name" => "string|min:3",
                "description" => "string|min:3",
                "locate" => "string|min:3",
                "image" => "image|mimes:jpeg,png,jpg|max:5000"
            ]);

            if ($request->file('image')) {
                Storage::disk('public')->delete('store-image/' . $store->image);

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('store-image', $imageName, 'public');
                $store->image = $imageName;
            }

            $slug = Str::slug($request->input('name'), '-');

            $store->name = $request->input('name');
            $store->description = $request->input('description');
            $store->locate = $request->input('locate');

            $store->save();

            return redirect('/dashboard-seller/store');
        }
    }

    public function createBanner(Request $request){
        $request->validate([
            'banner' => 'required|image|mimes:jpg,png,jpeg|max:5000'
        ]);

        $banner = $request->file('banner');
        $bannnerName = time() . '.' . $banner->getClientOriginalExtension();
        $banner->storeAs('banner-store', $bannnerName, 'public');

        $store = Store::where('user_id', Auth::user()->id)->first();

        Banner::create([
            'store_id' => $store->id,
            'image' => $bannnerName
        ]);

        return redirect()->back()->with('message-success', 'Upload banner successfully');
    }

    public function deleteBanner(Request $request){
        $banner = Banner::where('id', $request->input('banner_id'))->first();

        Storage::disk('public')->delete('banner-store/' . $banner->image);

        $banner->delete();

        return redirect()->back()->with('message', 'Delete banner successfully');
    }

    public function editBanner(Request $request){
        
        $banner = Banner::where('id', $request->input('banner_id'))->first();

        if($request->isMethod('GET')){
            return view('store.dashboard-seller.store.edit-banner', [
                'banner' => $banner
            ]);
        }else{

            Storage::disk('public')->delete('banner-store/' . $banner->image);
            $banner->delete();

            $image = $request->file('banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('banner-store', $imageName, 'public');

            $banner->image = $imageName;
            $banner->save();

            return redirect('/dashboard-seller/store')->with('message', 'Delete banner successfully');
        }
    }

    public function product(){

        $products = Product::all();

        return view('store.dashboard-seller.product.index', [
            'products' => $products
        ]);
    }

    public function createProduct(Request $request){

        if($request->isMethod('GET')){
            $products = Product::all();
            return view('store.dashboard-seller.product.create', [
                'products' => $products
            ]);
        }else{
            dd($request->all());
        }

    }




}
