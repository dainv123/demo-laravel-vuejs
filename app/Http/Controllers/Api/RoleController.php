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
                return '<b-link class="float-right btn btn-primary" :to="create">Create</b-link>';
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new Role();
            dd(datas);
        return $datas;
    }

    public function getCreate(){
        return 1;
    }

    public function postCreate(){
        return 2;
    }

    public function getEdit(){
        return 3;
    }

    public function postEdit(){
        return 4;
    }

    public function postDelete(){
        return 5;
    }
}
