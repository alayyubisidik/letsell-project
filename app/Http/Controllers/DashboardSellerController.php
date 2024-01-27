<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
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

    public function showStore(){

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

            $request->validate([
                'banner' => 'image|mimes:jpg,png,jpeg|max:5000'
            ]);
    
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

    public function showProduct(){

        $products = Product::with('productImages')->where('store_id', session('store')->id)->get();

        return view('store.dashboard-seller.product.index', [
            'products' => $products
        ]);
    }

    public function createProduct(Request $request){

        if($request->isMethod('GET')){
            $categories = Category::all();
            return view('store.dashboard-seller.product.create', [
                'categories' => $categories
            ]);
        }else{

            // dd($request->all());
            $store = Store::where('user_id', Auth::user()->id)->first();

            $request->validate([
                'category_id' => 'required|numeric',
                'name' => 'required|string|min:3',
                'description' => 'required|string|min:3',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
                'images' => 'required|array|max:5',
                'images.*' => 'image|mimes:jpeg,png,jpg|max:5000', // Sesuaikan dengan jenis file gambar yang diizinkan dan ukuran maksimum
            ]);

            $product = Product::create([
                'category_id' => $request->input('category_id'),
                'store_id' => $store->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'slug' => Str::slug($request->input('name'), '-'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);

            foreach ($request->file('images') as $image) {
                // $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imageName = time() . '_' . mt_rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('product-image', $imageName, 'public');
                ProductImage::create([
                    'image' => $imageName,
                    'product_id' => $product->id
                ]);
            }


            return redirect('/dashboard-seller/product');
        }
    }

    public function EditProduct(Request $request, $slug){
        $product = Product::where('slug', $slug)->with('productImages')->first();
        if($request->isMethod('GET')){
            // dd($product);
            $categories = Category::all();
            return view('store.dashboard-seller.product.edit', [
                'categories' => $categories,
                'product' => $product
            ]);
        }else{
            $request->validate([
                'category_id' => 'numeric',
                'name' => 'string|min:3',
                'price' => 'numeric',
                'stock' => 'numeric',
            ]);

            $slug = Str::slug($request->input('name'), '-');

            $product->name = $request->input('name');
            $product->slug = $slug;
            $product->category_id = $request->input('category_id');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->save();

            return redirect('/dashboard-seller/product');
        }
    }

    public function deleteProduct($slug)
    {
        $product = Product::where('slug', $slug)->with('productImages')->first();
    
        // Menghapus semua gambar terkait
        foreach ($product->productImages as $productImage) {
            Storage::disk('public')->delete('product-image/' . $productImage->image);
            $productImage->delete();
        }
    
        // Menghapus produk
        $product->delete();
    
        return redirect()->back();
    }

    public function showProductImage(Request $request, $slug){
        $product = Product::where('slug', $slug)->with('productImages')->first();
        return view('store.dashboard-seller.product.product-image', [
            'product' => $product,
            'slug' => $slug
        ]);
    }

    public function createProductImage(Request $request, $slug){
        if($request->isMethod('GET')){
            return view('store.dashboard-seller.product.create-product-image', [
                'slug' => $slug
            ]);
        }else{
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5000'
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product-image', $imageName, 'public');

            $product = Product::where('slug', $slug)->first();

            ProductImage::create([
                'image' => $imageName,
                'product_id' => $product->id
            ]);

            return redirect('/dashboard-seller/product-image/' . $slug);
        }
    }

    public function editProductImage(Request $request, $slug, $productImageId){
        $productImage = ProductImage::find($productImageId);
        if($request->isMethod('GET')){
            return view('store.dashboard-seller.product.edit-product-image', [
                'productImage' => $productImage,
                'slug' => $slug
            ]);
        }else{
            
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5000'
            ]);
    
            Storage::disk('public')->delete('product-image/' . $productImage->image);
            $productImage->delete();

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product-image', $imageName, 'public');

            $productImage->image = $imageName;
            $productImage->save();

            return redirect('/dashboard-seller/product-image/' . $slug)->with('message', 'Delete banner successfully');
        }
    }

    public function deleteProductImage( $id){
        $productImage = ProductImage::find($id);
        Storage::disk('public')->delete('product-image/' . $productImage->image);
        $productImage->delete();
        return redirect()->back();
    }


}
