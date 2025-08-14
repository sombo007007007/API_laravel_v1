<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainings;
use Carbon\Carbon;

class TrainingsController extends Controller
{
    public function index()
    {
        $index_Trainings = Trainings::get();
        return response()->json(['All_data_Trainings'=>$index_Trainings]); 
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $store_Trainings = new Trainings();
        $now_Trainings = Carbon::now();
        $result_data_Trainings=$store_Trainings->create([
            'training_title'=>$request->training_title,
            'training_description'=>$request->training_description,
            'created_at'=>$now_Trainings,
        ]);
        return response()->json([
            'Message'=>'Insert Successfully',
            'Result_Data_Trainings'=>$result_data_Trainings
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
    public function update(Request $request, $training_id)
    {
        $update_Trainings = Trainings::find($training_id);
        $now_Trainings = Carbon::now();
        $result_data_Trainings=$update_Trainings->update([
            'training_title'=>$request->training_title,
            'training_description'=>$request->training_description,
            'updated_at'=>$now_Trainings,
        ]);
        return response()->json([
            'Message'=>'Update Successfully',
        ],200);
    }
    public function destroy($training_id)
    {
        $delete_Trainings = Trainings::find($training_id);
        $delete_Trainings->delete();
        return response()->json(['Message'=>'Delete Successfully']);
    }
}
