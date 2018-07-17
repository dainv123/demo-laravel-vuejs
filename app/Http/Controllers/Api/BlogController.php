<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Datatables,File, Storage;

class BlogController extends Controller
{
    public function getList(){
        $datas = Blog::select()->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Blog();
        return $datas;
    }
    
    public function postCreate(Request $request){
        $datas = new Blog();
        $image = $request->get('image');
        $name = 'img_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('image'))->save(public_path('images/').$name);

        $data = [
            'name' => $request->get('name'),
            'alias' => changeTitle($request->get('name')),
            'oldprice' => $request->get('oldprice'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description'),
            'image' => $name,
            'intro' => $request->get('intro'),
            'content' => $request->get('content'),
            'categorie_id' => $request->get('categorie_id'),
            'user_id' => $request->get('user_id'),
        ];
        $dataCreated = Blog::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Blog::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Blog::where([
            'id' => $request->get('id'),
        ])->first();
        
        $name =  $request->get('image');

        if((bool)preg_match('/\.(jpg|png|jpeg)$/',  $request->get('image')) === false){
            $image = $request->get('image');
            $name = 'img_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('images/').$name);
            File::delete(public_path('images/').$data['image']);
        }

        if ($data) {
            $dataEdit = [
                'name' => $request->get('name'),
                'alias' => changeTitle($request->get('name')),
                'keywords' => $request->get('keywords'),
                'description' => $request->get('description'),
                'image' => $name,
                'intro' => $request->get('intro'),
                'content' => $request->get('content'),
                'categorie_id' => $request->get('categorie_id'),
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
        $data = Blog::where([
            'id' => $request->get('id'),
        ])->first();

        File::delete(public_path('images/').$data['image']);

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
