<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Datatables,File, Storage;

class SliderController extends Controller
{
    public function getList(){
        $datas = Slider::select()->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Slider();
        return $datas;
    }
    
    public function postCreate(Request $request){
        $datas = new Slider();
        $image = $request->get('image');
        $name = 'slider_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('image'))->save(public_path('images/').$name);

        $data = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $name,
            'intro' => $request->get('intro'),
            'product_id' => $request->get('product_id'),
        ];
        $dataCreated = Slider::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Slider::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Slider::where([
            'id' => $request->get('id'),
        ])->first();
        
        $name =  $request->get('image');

        if((bool)preg_match('/\.(jpg|png|jpeg)$/',  $request->get('image')) === false){
            $image = $request->get('image');
            $name = 'slider_'.time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('images/').$name);
            File::delete(public_path('images/').$data['image']);
        }

        if ($data) {
            $dataEdit = [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $name,
                'intro' => $request->get('intro'),
                'product_id' => $request->get('product_id'),
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
        $data = Slider::where([
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
