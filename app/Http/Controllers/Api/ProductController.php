<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Datatables,File, Storage;

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
        $image = $request->get('image');
        $name = 'img_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('image'))->save(public_path('images/').$name);

        $hoverimage = $request->get('hoverimage');
        $hovername = 'hover_img_'.time().'.' . explode('/', explode(':', substr($hoverimage, 0, strpos($hoverimage, ';')))[1])[1];
        \Image::make($request->get('hoverimage'))->save(public_path('images/').$hovername);

        $data = [
            'name' => $request->get('name'),
            'alias' => changeTitle($request->get('name')),
            'price' => $request->get('price'),
            'oldprice' => $request->get('oldprice'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description'),
            'image' => $name,
            'hoverimage' => $hovername,
            'intro' => $request->get('intro'),
            'content' => $request->get('content'),
            'avaibility' => $request->get('avaibility'),
            'categorie_id' => $request->get('categorie_id'),
            'size_id'=> $request->get('size_id'),
            'user_id' => $request->get('user_id'),
        ];
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
        
        $name =  $request->get('image');
        $hovername =  $request->get('hoverimage');

        if((bool)preg_match('/\.(jpg|png|jpeg)$/',  $request->get('image')) === false){
            $image = $request->get('image');
            $name = 'img_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('images/').$name);
            File::delete(public_path('images/').$data['image']);
        }

        if((bool)preg_match('/\.(jpg|png|jpeg)$/',  $request->get('hoverimage')) === false){
            $hoverimage = $request->get('hoverimage');
            $hovername = 'hover_img_'.time().'.' . explode('/', explode(':', substr($hoverimage, 0, strpos($hoverimage, ';')))[1])[1];
            \Image::make($request->get('hoverimage'))->save(public_path('images/').$hovername);
            File::delete(public_path('images/').$data['hoverimage']);
        }
        if ($data) {
            $dataEdit = [
                'name' => $request->get('name'),
                'alias' => changeTitle($request->get('name')),
                'price' => $request->get('price'),
                'oldprice' => $request->get('oldprice'),
                'keywords' => $request->get('keywords'),
                'description' => $request->get('description'),
                'image' => $name,
                'hoverimage' => $hovername,
                'intro' => $request->get('intro'),
                'content' => $request->get('content'),
                'avaibility' => $request->get('avaibility'),
                'categorie_id' => $request->get('categorie_id'),
                'size_id'=> $request->get('size_id'),
                'user_id' => $request->get('user_id'),
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

        File::delete(public_path('images/').$data['image']);
        File::delete(public_path('images/').$data['hoverimage']);

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
