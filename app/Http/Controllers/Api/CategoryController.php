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
    
    public function getListParentOption(){ 
        $datas = Category::select('id', 'name', 'parent_id')->orderBy('id','ASC')->get()->toArray();
        return cate_parent($datas,0,'',0);
    }

    public function postCreate(Request $request){
        if($request->get('order') < 0) 
            return response()->json([
                'status' => false
            ]);

        $datas = new Category();
        $data = [
            'name' => $request->get('name'),
            'alias' => changeTitle($request->get('name')),
            'order' => $request->get('order'),
            'parent_id' => $request->get('parent_id'),
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
        $datas = Category::select('id', 'name', 'order', 'parent_id')->where('id', $id)->first();
        return [
            'id' => $datas['id'], 
            'name' => $datas['name'], 
            'order' => $datas['order'], 
        ];
    }

    public function getSortParentOption($id){
        $datas = Category::select('id', 'name', 'order', 'parent_id')->where('id', $id)->first();
        $datas_full = Category::select('id', 'name', 'parent_id')->orderBy('id','ASC')->get()->toArray();
        return cate_parent($datas_full, 0,'',$datas['parent_id']);
    }

    public function postEdit(Request $request){
        if($request->get('id') == $request->get('parent_id') || $request->get('order') < 0) 
            return response()->json([
                'status' => false
            ]);

        $data = Category::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'name' => $request->get('name'),
                'alias' => changeTitle($request->get('name')),
                'order' => $request->get('order'),
                'parent_id' => $request->get('parent_id'),
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
