<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Auths;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AuthsController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'email'=> 'required',  
            'name'=> 'required',
            'password'=> 'required',
            'phone' => 'required'
        ], [], [
            'email'=> 'Enter Email',  
            'name'=> 'Enter Name',
            'password'=> 'Enter Password',
            'phone'=> 'Enter Phone'
        ]);
        $register_admin = new Auths();
        $profile = '';
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile')->store('profile', 'public');
        }
        $now_admin = Carbon::now();
        $Insert_register_admin = $register_admin->create([
            'profile'=>$profile,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            // 'is_active'=>$request->is_active,
            'branch_id'=>$request->branch_id,
            'created_at'=>$now_admin 
        ]);
        return response()->json([
            'Message' => 'Insert Successfully',
            'All_data_rigster'=>$Insert_register_admin
        ]);
    }
}
