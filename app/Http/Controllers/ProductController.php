<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request)
    {

        $categories = Category::withCount('products')->get();

        if ($request->min && $request->max) {

            $minPrice = $request->min;
            $maxPrice = $request->max;

            $products = Product::with('productImages')
                ->with('store')
                ->with('category')
                ->whereBetween('price', [$minPrice, $maxPrice])
                ->get();
    
            return view('product.index', [
                'products' => $products,
                'categories' => $categories,
                // 'selectedMinPrice' => $minPrice,
                // 'selectedMaxPrice' => $maxPrice,
            ]);
        }

        if ($request->search) {
            $searchTerm = $request->search;
    
            $products = Product::with('productImages')
                ->with('store')
                ->with('category')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%') // Pencarian berdasarkan nama produk
                        ->orWhereHas('category', function ($categoryQuery) use ($searchTerm) {
                            $categoryQuery->where('name', 'like', '%' . $searchTerm . '%'); // Pencarian berdasarkan nama kategori
                        })
                        ->orWhereHas('store', function ($storeQuery) use ($searchTerm) {
                            $storeQuery->where('name', 'like', '%' . $searchTerm . '%'); // Pencarian berdasarkan nama toko
                        });
                })
                ->get();
    
            return view('product.index', [
                'products' => $products,
                'categories' => $categories
            ]);
        } else {
            $products = Product::with('productImages')
                ->with('store')
                ->with('category')
                ->get();
    
            return view('product.index', [
                'products' => $products,
                'categories' => $categories
            ]);
        }
    }

    public function productDetail($slug){

        $product = Product::where('slug', $slug)
        ->with('productImages')
        ->with('store')
        ->with('category')
        ->first();

        $productByStore = Product::where('store_id', $product->store->id)
        ->where('slug', '!=', $slug)
        ->get();

        // dd($productByStore);
        $storeProductCount = Product::where('store_id', $product->store->id)->count();

        return view('product.detail', [
            'product' => $product,
            'storeProductCount' => $storeProductCount,
            'productByStore' => $productByStore
        ]);
    }
    
}
