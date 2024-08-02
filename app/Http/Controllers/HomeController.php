<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function index()
    // {
    //     return view('home');
    // }
    
    public function showHome(){
        $banner = Banner::query()->where('type_status' , 'hot_deal')->where('is_active', 1)->first();
        $products = Product::query()->latest('id')->limit(4)->get();
        // dd($data);
        return view('client.home', compact('products', 'banner'));
    }
}
