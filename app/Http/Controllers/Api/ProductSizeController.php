<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Datatables;

class ProductSizeController extends Controller
{
    public function getList(){
        $this->authorize('view', ProductSize::class);        
        $datas = ProductSize::select('id', 'name', 'dimension', 'created_at')->orderBy('id','DESC')->get()->toArray();
        return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                return $data['id'];
            })
            ->rawColumns(['action'])
            ->make(true);
            $demo = new ProductSize();
        return $datas;
    }
    
    public function postCreate(Request $request){
        $this->authorize('create', ProductSize::class);

        $datas = new ProductSize();
        $data = [
            'name' => $request->get('name'),
            'dimension' => $request->get('dimension'),
        ];
        $dataCreated = ProductSize::create($data);
        if ($dataCreated->id)
            return response()->json([
                'status' => true,
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function getEdit($id){
        $this->authorize('edit', ProductSize::class);
        $datas = ProductSize::find($id);
        return $datas;
    }

    public function postEdit(Request $request){
        $this->authorize('edit', ProductSize::class);
        $data = ProductSize::where([
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
        $this->authorize('delete', ProductSize::class);

        $data = ProductSize::where([
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
