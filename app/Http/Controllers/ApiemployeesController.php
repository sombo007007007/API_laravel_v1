<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiemployeesModels;

class ApiemployeesController extends Controller
{
    public function index()
    {
        $data_employees = ApiemployeesModels::get();
        return response()->json(['data_employee'=> $data_employees]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $store_employees = new ApiemployeesModels();
        $store = $store_employees->create([
            'name_kh_emp' => $request->name_kh_emp,
            'name_en_emp' => $request->name_en_emp,
        ]);
        return response()->json([
            'massage'=>'Success',
            'data' => $store,
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
