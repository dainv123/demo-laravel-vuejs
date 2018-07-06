<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Datatables;

class CategoryController extends Controller
{
    public function getList(){
        $datas = Category::select('id', 'name', 'alias', 'order', 'parent_id','created_at')->orderBy('id','ASC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->addColumn('parent_id', function ($data) {
                if($data['parent_id'] == 0)
                    return 'None';
                else{
                    $parent_name = Category::where(['id' => $data['parent_id']])->first()->name;
                    return $parent_name;
                }
            })
            ->make(true);
            $demo = new Category();
        return $datas;
    }
    
    public function getCreate(){
        $datas = Category::select('id', 'name', 'parent_id')->orderBy('id','ASC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('value', function ($data) {
                return $data['id'];
            })
            ->addColumn('text', function ($data) {
                return $data['name'];
            })
            ->removeColumn('id')
            ->removeColumn('name')
            ->removeColumn('parent_id')
            ->rawColumns(['value'])
            ->make(true);
            $demo = new Category();
        return $datas;
    }

    public function postCreate(Request $request){
        $datas = new Category();
        $data = [
            'name' => $request->get('name'),
            'dimension' => $request->get('dimension'),
        ];
        $dataCreated = Category::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Category::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Category::where([
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
        $data = Category::where([
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
