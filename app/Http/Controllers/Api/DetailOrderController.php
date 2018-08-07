<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use Datatables;

class DetailOrderController extends Controller
{
    public function getList(){
        $datas = DetailOrder::select('id', 'title', 'created_at')->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new DetailOrder();
        return $datas;
    }

    public function postCreate(Request $request){
        $datas = new DetailOrder();
        $data = [
            'title' => $request->get('title'),
        ];
        $dataCreated = DetailOrder::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $datas = DetailOrder::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $data = DetailOrder::where([
            'id' => $request->get('id'),
        ])->first();

        if ($data) {
            $dataEdit = [
                'title' => $request->get('title'),
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
        $data = DetailOrder::where([
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
