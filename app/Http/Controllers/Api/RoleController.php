<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function getList(){
        $data = Role::select('id', 'title')->orderBy('id','DESC')->get()->toArray();
        // return view('admin.cate.list', compact('data'));
        return $data;
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
