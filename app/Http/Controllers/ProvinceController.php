<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvinceModels;
use Carbon\Carbon;

class ProvinceController extends Controller
{
    public function index()
    {
        $provice = ProvinceModels::get();
        return response()->json(['data_provices'=> $provice]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'province_en_name' => 'required',
            'province_kh_name' => 'required',
        ],[ ],[
            'province_en_name' => 'Enter Province Name english',
            'province_kh_name' => 'Enter Province Name Khmer',
        ]);
        $provices = new ProvinceModels();
        $now = Carbon::now();
        $autoPostalCode = rand(10000, 99999);
        $insert_provices=$provices->create([
            'postal_code' => $autoPostalCode,
            'province_en_name'=> $request->province_en_name,
            'province_kh_name' =>$request->province_kh_name,
            'branch_id' => $request->branch_id,
            'created_at'=> $now,
        ]);
        return response()->json([
            'massage' => 'Insert Successfully',
            'result data provices' => $insert_provices
        ]);
    }

    /**
     * Display the specified resource.
     */
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
    public function update(Request $request, $province_id)
    {
        $this->validate($request,[
            'province_en_name' => 'required',
            'province_kh_name' => 'required',
        ],[ ],[
            'province_en_name' => 'Enter Province Name english',
            'province_kh_name' => 'Enter Province Name Khmer',
        ]);
        $update_provices = ProvinceModels::find($province_id);
        $updated_at = Carbon::now();
        $autoPostalCode = rand(10000, 99999);
        $update_provices=$update_provices->update([
            'postal_code' => $autoPostalCode,
            'province_en_name'=> $request->province_en_name,
            'province_kh_name' =>$request->province_kh_name,
            'branch_id' => $request->branch_id,
            'updated_at'=> $updated_at,
        ]);
        return response()->json([
            'massage' => 'Insert Successfully',
            'result data provices' => $update_provices
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($province_id)
    {
        $provice_delete = ProvinceModels::find($province_id);
        $provice_delete->delete();
        return response()->json(['massages'=>'Delete Successfully']);
    }
}
