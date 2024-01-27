<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function submitReport (Request $request){
        // dd($request->all());

        Report::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'content' => $request->content
        ]);

        return redirect()->back();
    }
}
