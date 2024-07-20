<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        $products = Product::query()->latest('id')->limit(4)->get();
        // dd($data);
        return view('client.home', compact('products'));
    }
}
