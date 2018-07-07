<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Datatables;

class PermissionController extends Controller
{
    public function getList(){
        $datas = Permission::select('id', 'title', 'name', 'created_at')->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Permission();
        return $datas;
    }

    public function postCreate(Request $request){
        $datas = new Permission();
        $data = [
            'title' => $request->get('title'),
            'name' => $request->get('name')
        ];
        $dataCreated = Permission::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = Permission::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = Permission::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'title' => $request->get('title'),
                'name' => $request->get('name')
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
        $data = Permission::where([
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
