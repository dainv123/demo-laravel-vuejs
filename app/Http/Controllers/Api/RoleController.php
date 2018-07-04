<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Datatables;

class RoleController extends Controller
{
    public function getList(){
        $datas = Role::select('id', 'title', 'created_at')->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Role();
        return $datas;
    }

    public function getCreate($id){
        
    }

    public function postCreate(){
        
    }

    public function getEdit($id){
        $datas = Role::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        dd(111);
    }

    public function postDelete(Request $request){
        $data = Role::where([
            'id' => $request->get('id'),
            // 'user_id' => Auth::id()
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
