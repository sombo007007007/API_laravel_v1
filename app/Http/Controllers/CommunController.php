<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\CommunRequests;
use App\Models\CommunModels;
use Carbon\Carbon;

class CommunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_communs = CommunModels::get();
        return response()->json(['data_communs' => $data_communs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunRequests $request)
    {
        $store_communs = new CommunModels();
        $code_Communs = rand(10000, 99999);
        $now_Communs = Carbon::now();
        $data_communs = $store_communs->create([
            'district_id'=>$request->district_id,
            'code' => $code_Communs,
            'commune_name' => $request->commune_name,
            'commune_namekh'=> $request->commune_namekh,
            'modify_date'=>$request->modify_date,
            'status'=>$request->status,
            'created_at' => $now_Communs,
        ]);
        return response()->json([
            'message' => 'Insert Successfully',
            'data_insert' => $data_communs
        ],201);
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
    public function update(CommunRequests $request, $com_id)
    {
        $update_communs = CommunModels::find($com_id);
        $code_Communs = rand(10000, 99999);
        $now_Communs = Carbon::now();
        $update_data_communs = $update_communs->update([
            'district_id'=>$request->district_id,
            'code' => $code_Communs,
            'commune_name' => $request->commune_name,
            'commune_namekh'=> $request->commune_namekh,
            'modify_date'=>$request->modify_date,
            'status'=>$request->status,
            'updated_at' => $now_Communs,
        ]);
        return response()->json([
            'message' => 'update Successfully',
            'data_insert' => $update_data_communs
        ],200);
    }
    public function destroy($com_id)
    {
        $delete_communcs = CommunModels::find($com_id);
        $delete_communcs->delete();
        return response()->json(['message'=>'Delete Successfully']);
    }
}
