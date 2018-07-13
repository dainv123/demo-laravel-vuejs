<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Datatables;

class ProductController extends Controller
{
    public function getList(){
        $datas = Product::select()->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Product();
        return $datas;
    }
    
    public function postCreate(Request $request){
        $datas = new Product();
        dd($request->file('image'));
        $file_name = $request->file('image')->getClientOriginalName();
        dd($file_name);
        $data = [
            'name' => $request->get('name'),
            'alias' => changeTitleTitle($request->get('name')),
            'price' => $request->get('price'),
            'oldprice' => $request->get('oldprice'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description'),
            'image' => $request->get('image'),
            'hoverimage' => $request->get('hoverimage'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'avaibility' => $request->get('avaibility'),
        ];
        dd($data);
        $dataCreated = Product::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Product::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Product::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'name' => $request->get('name'),
                'dimension' => $request->get('dimension'),
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
        $data = Product::where([
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
