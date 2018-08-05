<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Cart, Request;

class ProductController extends Controller
{
    public function getProductDetail($id){
        $products = Product::find($id);
        $productimages = ProductImage::select('id','image')
                     ->where('product_id', $id)
                     ->get();

        return view('user.page.product-details', compact('products','productimages'));
    }

    public function buyCart(){
        if(Request::ajax()){
            $results = Request::get('result');
            $id = (int)$results['id'];
            $qty = (int)$results['qty'];

            $product = Product::find($id);
            Cart::add(['id'=> $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'options' => ['id' => $id,'image' => $product->image]]);
            
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function listCart(){
        $cart_list = Cart::content();
        $cart_total = Cart::total();
        return view('user.page.cart', compact('cart_list', 'cart_total'));
    }

}
