<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiemployeesController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CommunController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SaleryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\AuthsController;
use App\Http\Controllers\HomeController;


Route::post('/v1/auth/register', [AuthsController::class, 'register']);
Route::post('/v1/auth/login', [AuthsController::class, 'login']);
Route::get('/v1/auth/login',[HomeController::class,'index'])->name('index');
Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::get('/v1/auth/profile', function (Request $request) {
        return $request->user();
    });

    Route::get('/v1/get_employee', [ApiemployeesController::class, 'index']);
    Route::post('/v1/post_employee', [ApiemployeesController::class, 'store']);
    // Branches
    Route::get('/v1/get_branches',[BranchesController::class ,'index']);
    Route::post('/v1/post_branches',[BranchesController::class ,'store']);
    Route::post('/v1/update_branches/{id}', [BranchesController::class, 'update']);
    Route::get('/v1/destroy/{id}', [BranchesController::class, 'destroy']);
    // provices
    Route::get('/v1/provice',[ProvinceController::class, 'index']);
    Route::post('/v1/provice/stores',[ProvinceController::class,'store']);
    Route::get('/v1/provice/destroy/{province_id}', [ProvinceController::class, 'destroy']);
    Route::post('/v1/provice/update/{province_id}', [ProvinceController::class, 'update']);
    // District
    Route::get('/v1/district/index',[DistrictController::class, 'index']);
    Route::post('/v1/district/store',[DistrictController::class, 'store']);
    Route::post('/v1/district/update/{dis_id}',[DistrictController::class, 'update']);
    Route::get('/v1/district/delete/{dis_id}',[DistrictController::class, 'destroy']);
    // communes
    Route::get('/v1/communes/index',[CommunController::class, 'index']);
    Route::post('/v1/communes/store',[CommunController::class, 'store']);
    Route::post('/v1/communes/update/{com_id}', [CommunController::class, 'update']);
    Route::get('/v1/communes/detele/{com_id}', [CommunController::class, 'destroy']);
    // villages
    Route::get('/v1/Village/index',[VillageController::class, 'index']);
    Route::post('/v1/Village/store',[VillageController::class, 'store']);
    Route::post('/v1/Village/update/{vill_id}',[VillageController::class, 'update']);
    Route::get('/v1/Village/destroy/{vill_id}',[VillageController::class, 'destroy']);
    // Employees
    Route::get('/v1/Employees/index',[EmployeesController::class, 'index']);
    Route::post('/v1/Employees/store',[EmployeesController::class, 'store']);
    Route::post('/v1/Employees/update/{em_id}',[EmployeesController::class, 'update']);
    Route::get('/v1/Employees/delete/{em_id}',[EmployeesController::class, 'destroy']);
    // Saleris
    Route::get('/v1/Saleris/index',[SaleryController::class, 'index']);
    Route::post('/v1/Saleris/store',[SaleryController::class, 'store']);
    Route::post('/v1/Saleris/update/{salery_id}',[SaleryController::class, 'update']);
    Route::get('/v1/Saleris/detele/{salery_id}',[SaleryController::class, 'destroy']);
    // Attendance
    Route::get('/v1/Attendance/index',[AttendanceController::class, 'index']);
    Route::post('/v1/Attendance/store',[AttendanceController::class, 'store']);
    Route::post('/v1/Attendance/update/{Att_id}',[AttendanceController::class, 'update']);
    Route::get('/v1/Attendance/detele/{Att_id}',[AttendanceController::class, 'destroy']);
    // Vacation
    Route::get('/v1/Vacation/index',[VacationController::class, 'index']);
    Route::post('/v1/Vacation/store',[VacationController::class, 'store']);
    Route::post('/v1/Vacation/update/{vacation_id}',[VacationController::class, 'update']);
    Route::get('/v1/Vacation/detele/{vacation_id}',[VacationController::class, 'destroy']);
    // Trainings
    Route::get('/v1/Trainings/index',[TrainingsController::class, 'index']);
    Route::post('/v1/Trainings/store',[TrainingsController::class, 'store']);
    Route::post('/v1/Trainings/update/{training_id}',[TrainingsController::class, 'update']);
    Route::get('/v1/Trainings/detele/{training_id}',[TrainingsController::class, 'destroy']);
    // Evaluations
    Route::get('/v1/Evaluations/index',[EvaluationsController::class, 'index']);
    Route::post('/v1/Evaluations/store',[EvaluationsController::class, 'store']);
    Route::post('/v1/Evaluations/update/{training_id}',[EvaluationsController::class, 'update']);
    Route::get('/v1/Evaluations/detele/{training_id}',[EvaluationsController::class, 'destroy']);
});