<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(){
        return view('dashboard-admin.product.index');
    }

    public function category(){
        return view('dashboard-admin.category.index', [
            'categories' => Category::withCount('products')->get()
        ]);
    }

    public function createCategory(Request $request){
        if($request->isMethod('GET')){
            return view('dashboard-admin.category.create');
        }else{

            Category::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'))
            ]);

            return redirect('/dashboard-admin/category');
        }
    }

    public function createProduct(Request $request){
        if($request->isMethod('GET')){
            return view('dashboard-admin.product.create');
        }else{
            dd($request->all());
            return redirect('/dashboard-admin/product');
        }
    }

    

}
