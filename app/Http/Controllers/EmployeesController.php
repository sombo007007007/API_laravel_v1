<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\EmployeesRequests;
use App\Models\Employees;
use Carbon\Carbon;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::get();
        return response()->json(['All_data_employees'=> $employees ]);
    }
    public function create()
    {
        //
    }
    public function store(EmployeesRequests $request)
    {
        $store_employees = new Employees();
        $image_emp_all = '';
        if($request->hasFile('image_emp')){
            $image_emp_all = $request->file('image_emp')->store('Employees','public');
        }
        $image_id_card_all = '';
        if($request->hasFile('image_id_card')){
            $image_id_card_all = $request->file('image_id_card')->store('Image_Id_Card','public');
        }
        $now_employee = Carbon::now();
        $Data_employees = $store_employees->create([
            'image_emp' => $image_emp_all,
            'image_id_card' => $image_id_card_all,
            'code_employees'=> $request->code_employees,
            'Id_card' => $request->Id_card,
            'name_kh_emp' => $request->name_kh_emp,
            'name_en_emp' => $request->name_en_emp,
            'date_of_brithdy'=> $request->date_of_brithdy,
            'identity'=>$request->identity,
            'sex' => $request->sex,
            'email_emp' => $request->email_emp,
            'mobile_emp'=> $request->mobile_emp,
            'status' => $request->status,
            'provi_id' => $request->provi_id,
            'distr_id' => $request->distr_id,
            'commu_id' => $request->commu_id,
            'villag_id' => $request->villag_id,
            'branch_id' => $request->branch_id,
            'created_at'=> $now_employee,
        ]);
        return response()->json([
            'message'=>'Insert Successfully',
            'Result_employye'=>$Data_employees 
        ],201);


    }
    public function edit(string $id)
    {
        //
    }
    public function update(EmployeesRequests $request,$em_id)
    {
        $update_employees = Employees::find($em_id);
        $image_emp_all = '';
        if($request->hasFile('image_emp')){
            $image_emp_all = $request->file('image_emp')->store('Employees','public');
        }
        $image_id_card_all = '';
        if($request->hasFile('image_id_card')){
            $image_id_card_all = $request->file('image_id_card')->store('Image_Id_Card','public');
        }
        $now_employee = Carbon::now();
        $Update_Data_employees = $update_employees->update([
            'image_emp' => $image_emp_all,
            'image_id_card' => $image_id_card_all,
            'code_employees'=> $request->code_employees,
            'Id_card' => $request->Id_card,
            'name_kh_emp' => $request->name_kh_emp,
            'name_en_emp' => $request->name_en_emp,
            'date_of_brithdy'=> $request->date_of_brithdy,
            'identity'=>$request->identity,
            'sex' => $request->sex,
            'email_emp' => $request->email_emp,
            'mobile_emp'=> $request->mobile_emp,
            'status' => $request->status,
            'provi_id' => $request->provi_id,
            'distr_id' => $request->distr_id,
            'commu_id' => $request->commu_id,
            'villag_id' => $request->villag_id,
            'branch_id' => $request->branch_id,
            'updated_at'=> $now_employee,
        ]);
        return response()->json([
            'message'=>'Insert Successfully',
            'Result_employye'=>$Update_Data_employees 
        ],200);
    }
    public function destroy($em_id)
    {
        $delete_employees = Employees::find($em_id);
        if(!$delete_employees){
            return response()->json(['message'=>'Employees not found'],404);
        }
        if($delete_employees->image_emp && file_exists(public_path($delete_employees->image_emp))){
            unlink(public_path($delete_employees->image_emp));
        }
        if($delete_employees->image_id_card && file_exists(public_path($delete_employees->image_id_card))){
            unlink(public_path($delete_employees->image_id_card));
        }
        $delete_employees->delete();
        return response()->json(['message'=>'Delete Employees Successfully']);
    }
}
