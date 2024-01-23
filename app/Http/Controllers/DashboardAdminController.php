<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(){
        return view('dashboard-admin.product.index');
    }

    public function showCategory(){
        return view('dashboard-admin.category.index', [
            'categories' => Category::withCount('products')->get()
        ]);
    }

    public function createCategory(Request $request){
        if($request->isMethod('GET')){
            return view('dashboard-admin.category.create');
        }else{

            $request->validate([
                'name' => 'required|string|min:3|unique:categories,name'
            ]);

            Category::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name'), '-'),
            ]);

            return redirect('/dashboard-admin/category');
        }
    }

    public function showUser(){

        $users = User::where('role', 'customer')->orWhere('role', 'seller')->get();

        return view('dashboard-admin.user.index', [
            'users' => $users
        ]);
    }

    public function approveTheUser(Request $request){
        $user = User::where('username', $request->username)->first();
        $user->status = intval($request->status);
        $user->save();

        return redirect()->back();
    }
 

}
