<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboardProductPage(){
        return view('dashboard.product.index');
    }
}
