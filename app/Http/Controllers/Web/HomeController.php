<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // return view('home');
        $products = Product::select()->orderBy('id','DESC')->get()->toArray();
        return view('user.page.index', compact('products'));
    }

    public function index1()
    {
        return view('home');
        // $products = Product::select()->orderBy('id','DESC')->get()->toArray();
        // return view('user.page.index', compact('products'));
    }
    
}
