<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salery;
use Carbon\Carbon;

class SaleryController extends Controller
{
    public function index()
    {
        $saleris = Salery::get();
        return response()->json(['All_data_saleris'=>$saleris]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $store_saleris = new Salery();
        $now_saleris = Carbon::now();
        $result_saleris = $store_saleris->create([
            'salery'=>$request->salery,
            'bonus'=>$request->bonus,
            'loan'=>$request->loan,
            'Last_update'=>$request->Last_update,
            'employee_id'=>$request->employee_id,
            'created_at'=>$now_saleris,
        ]);
        return response()->json([
            'message'=>'Insert Successfully',
            'All_data'=> $result_saleris
        ],201);
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, $salery_id)
    {
         $update_saleris =Salery::find($salery_id);
        $now_saleris = Carbon::now();
        $result_saleris = $update_saleris->update([
            'salery'=>$request->salery,
            'bonus'=>$request->bonus,
            'loan'=>$request->loan,
            'Last_update'=>$request->Last_update,
            'employee_id'=>$request->employee_id,
            'updated_at'=>$now_saleris,
        ]);
        return response()->json([
            'message'=>'Update Successfully',
            'All_data'=> $result_saleris
        ],200);
    }
    public function destroy(string $salery_id)
    {
        $delete_saleris=Salery::find($salery_id);
        $delete_saleris->delete();
        return response()->json(['Message'=>'Delete Successfully']);
    }
}
