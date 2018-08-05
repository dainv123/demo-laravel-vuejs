<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Datatables, Cart;

class OrderController extends Controller
{
    public function getList(){
        $datas = Order::select('id', 'title', 'created_at')->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Order();
        return $datas;
    }

    public function postCreate(Request $request){
        // $datas = new Order();
        $data = [
            'user_id' => $request->get('g_user_id'),
            'g_cart_list' => $request->get('g_cart_list'),
            'g_cart_total' => $request->get('g_cart_total'),
        ];
        dd($data);

        $dataCreated = Order::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Order::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Order::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'title' => $request->get('title'),
            ];
            $data->update($dataEdit);
            return response()->json([
                'status' => true,
            ]);
        }
        
        return response()->json([
            'status' => false
        ]);
    }

    public function postDelete(Request $request){
        $data = Order::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data->delete()) {
            return response()->json([
                'status' => true
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
