<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\DetailOrder;
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
            Cart::add(['id'=> $id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'options' => ['image' => $product->image]]);

            return response()->json([
                'status' => true
            ]);
        }
    }

    public function listCart(){
        $cart_list = Cart::content();
        $cart_total = Cart::total();
        $cart_subtotal = Cart::subtotal();
        $cart_delivery = Cart::delivery();
        // dd(Cart::subtotal());
        return view('user.page.cart', compact('cart_list', 'cart_total','cart_subtotal'));
    }

    public function updateCart(){
        if(Request::ajax()){
            $results = Request::get('result');
            foreach ($results as $result) {
                Cart::update($result['rowid'], ['qty' => $result['qty']]);
            }

            return response()->json([
                'status' => true
            ]);
        }
    }
    

    public function deleteCart($id){
        Cart::remove($id);

        return response()->json([
            'status' => true
        ]);
        
    }

    public function getCheckout(){
        return view('user.page.checkout');
    }

    public function postCheckout(Request $request){
        if(Request::ajax()){
            $user_id = Auth::user()['id'];
            $cart_list = Cart::content();
            $cart_total = Cart::total();
            $order_id = $user_id.''.time();

            $data = [
                'order_id' => $order_id,
                'user_id' => $user_id,
                'total_price' => $cart_total,
                'status' => 'pending'
            ];

            $dataCreated = Order::create($data);

            if (!$dataCreated->order_id)
                return response()->json([
                    'status' => false
                ]);

            foreach ($cart_list as $value){
                $data = [
                    'order_id' => $order_id,
                    'product_id' => $value->id,
                    'qty' => $value->qty
                ];
                $dataCreated = DetailOrder::create($data);
                if (!$dataCreated->order_id)
                    return response()->json([
                        'status' => false
                    ]);
            }

            return response()->json([
                'status' => true
            ]);
        }
    }
}
