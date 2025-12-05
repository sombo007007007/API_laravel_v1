<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacations;
use Carbon\Carbon;

class VacationController extends Controller
{
    public function index()
    {
        $index_Vacations = Vacations::get();
        return response()->json(['All_data_Vacations'=>$index_Vacations]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $store_Vacations = new Vacations();
        $now_Vacations = Carbon::now();
        $result_data_Vacations = $store_Vacations->create([
            'vacation_title' => $request->vacation_title,
            'vacation_from_date'=> $request->vacation_from_date,
            'vacation_to_date'=>$request->vacation_to_date,
            'employee_id'=>$request->employee_id,
            'created_at'=>$now_Vacations,
        ]);
        return response()->json([
            'Message'=>'Insert Successfully',
            'Result'=>$result_data_Vacations
        ],201);
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $vacation_id)
    {
        $update_Vacations = Vacations::find($vacation_id);
        $now_Vacations = Carbon::now();
        $result_data_Vacations = $update_Vacations->update([
            'vacation_title' => $request->vacation_title,
            'vacation_from_date'=> $request->vacation_from_date,
            'vacation_to_date'=>$request->vacation_to_date,
            'employee_id'=>$request->employee_id,
            'updated_at'=>$now_Vacations,
        ]);
        return response()->json([
            'Message'=>'Update Successfully',
            'Result'=>$result_data_Vacations
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $vacation_id)
    {
        $delete_Vacations = Vacations::find($vacation_id);
        $delete_Vacations->delete();
        return response()->json(['Message'=>'Delete Successfully']);
    }
}
