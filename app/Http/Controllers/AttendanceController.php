<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index_Attendance = Attendance::get();
        return response()->json(['All_data_Attendance'=>$index_Attendance]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $store_Attendance = new Attendance();
        $now_Attendance = Carbon::now();
        $result_store_Attendance = $store_Attendance->create([
            'Att_type'=>$request->Att_type,
            'Att_time_date'=>$request->Att_time_date,
            'employee_id'=>$request->employee_id,
            'created_at'=>$now_Attendance,
        ]);
        return response()->json([
            'Message'=>'Insert Successfully',
            'Result_data'=>$result_store_Attendance
        ],201);
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Att_id)
    {
        $store_Attendance = Attendance::find($Att_id);
        $now_Attendance = Carbon::now();
        $result_store_Attendance = $store_Attendance->update([
            'Att_type'=>$request->Att_type,
            'Att_time_date'=>$request->Att_time_date,
            'employee_id'=>$request->employee_id,
            'updated_at'=>$now_Attendance,
        ]);
        return response()->json([
            'Message'=>'update Successfully',
            'Result_data'=>$result_store_Attendance
        ],200);
    }
    public function destroy($Att_id)
    {
        $delete_Attendance = Attendance::find($Att_id);
        $delete_Attendance->delete();
        return response()->json(['Messages'=>'Delete Successfully']);
    }
}
