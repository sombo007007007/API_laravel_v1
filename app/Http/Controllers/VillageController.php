<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use Carbon\Carbon;
use \Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\VillageRequests;

class VillageController extends Controller
{
    public function index()
    {
        $village = Village::get();
        return response()->json(['All_data_village'=> $village ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(VillageRequests $request)
    {
        $store_village = new Village();
        $code_village = rand(10000, 99999);
        $now_village = Carbon::now();
        $data_village = $store_village->create([
            'commune_id' => $request->commune_id,
            'code'=>$code_village,
            'village_name'=>$request->village_name,
            'village_namekh'=>$request->village_namekh,
            'modify_date'=>$request->modify_date,
            'status'=>$request->status,
            'created_at'=>$now_village,
        ]);
        return response()->json([
            'message'=>'Successfully',
            'Data_insert' => $data_village
        ],201);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function update(VillageRequests $request, $vill_id)
    {
        $update_village = Village::find($vill_id);
        $code_village = rand(10000, 99999);
        $now_village = Carbon::now();
        $update_data_village = $update_village->update([
            'commune_id' => $request->commune_id,
            'code'=>$code_village,
            'village_name'=>$request->village_name,
            'village_namekh'=>$request->village_namekh,
            'modify_date'=>$request->modify_date,
            'status'=>$request->status,
            'updated_at'=>$now_village,
        ]);
        return response()->json([
            'message'=>'Successfully',
            'Data_update' => $update_data_village
        ],200);
    }
    public function destroy($vill_id)
    {
        $delete_village = Village::find($vill_id);
        $delete_village->delete();
        return response()->json(['message'=>'Delete Successfully']);
    }
}
