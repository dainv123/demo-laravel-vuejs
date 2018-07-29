<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Datatables;
use Hash;


class UserController extends Controller
{   
    public function getRole($id){
        $datas = Role::where([
            'id' => $id,
        ])->first();
        return $datas['title'];
    }

    public function getList(){
        $datas = User::select()->orderBy('id','DESC')->get()->toArray();
        
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->addColumn('name', function ($data) {
                return $data['firstname'].' '.$data['lastname'];
            })
            ->addColumn('role', function ($data) {
                return self::getRole($data['role_id']);
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new User();
        return $datas;
    }

    public function postCreate(Request $request){
        if($request->get('password') != $request->get('repassword'))
        return response()->json([
            'status' => false
        ]);

        $datas = new User();
        $data = [
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'sex' => $request->get('sex'),
            'birthday' => $request->get('birthday'),
            'status'=> $request->get('status'),
            'subscribe'=> $request->get('subscribe'),
            'role_id'=> $request->get('role'),
        ];
        $dataCreated = User::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = User::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = User::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'email' => $request->get('email'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'sex' => $request->get('sex'),
                'birthday' => $request->get('birthday'),
                'status'=> $request->get('status'),
                'subscribe'=> $request->get('subscribe'),
                'role_id'=> $request->get('role'),
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
        $data = User::where([
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
