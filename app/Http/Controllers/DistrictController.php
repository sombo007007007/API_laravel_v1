<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DistrictModels;
use \Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\ValidateDistricts;
use Carbon\Carbon;

class DistrictController extends Controller
{
    public function index()
    {
        $districs = DistrictModels::get();
        // dd($districs->provinces->province_kh_name);
        return response()->json(["massage" => $districs]);
    }
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateDistricts $request)
    {
        $districts = new  DistrictModels();
        $code_districts = rand(10000, 99999);
        $now_districts = Carbon::now();
        $districts_data = $districts->create([
            'code'=>$code_districts,
            'district_name' => $request->district_name,
            'district_namekh'=> $request->district_namekh,
            'modify_date'=>$request->modify_date,
            'pro_id'=>$request->pro_id,
            'created_at'=>$now_districts,
        ]);
        return response()->json([
            'message'=>'Insert Successfully',
            'districts_result' => $districts_data
        ],201);
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateDistricts $request,$dis_id)
    {
        $update_districts =DistrictModels::find($dis_id);
        $code_districts = rand(10000, 99999);
        $update_now_districts = Carbon::now();
        $update_districts_data = $update_districts->update([
            'code'=>$code_districts,
            'district_name' => $request->district_name,
            'district_namekh'=> $request->district_namekh,
            'modify_date'=>$request->modify_date,
            'pro_id'=>$request->pro_id,
            'updated_at'=>$update_now_districts,
        ]);
        return response()->json([
            'message'=>'Insert Successfully',
            'districts_result' => $update_districts_data
        ]);
    }
    public function destroy($dis_id)
    {
        $delete_districts = DistrictModels::find($dis_id);
        $delete_districts->delete();
        return response()->json(['message'=>'Delete Successfully']);
    }
}
