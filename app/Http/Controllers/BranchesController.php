<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branches;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
// use \Illuminate\Foundation\Validation\ValidatesRequests;
// use App\Http\Requests\StoreBranchesRequest;

class BranchesController extends Controller
{
    public function index()
    {
        $Branches_data = Branches::get();
        return response()->json([
            'data_branches' => $Branches_data,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'address'       => 'required',  
            'name_en'       => 'required',
            'name_kh'       => 'required',
            'date_of_birth' => 'required'
        ], [], [
            'address'       => 'Enter Address',  
            'name_en'       => 'Enter Name English',
            'name_kh'       => 'Enter Name Khmer',
            'date_of_birth' => 'Enter Date Of Birth'
        ]);

        $store_branches = new Branches();
        $featured_new_name = '';
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $featured_new_name = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Images/image'), $featured_new_name);
            $featured_new_name = 'images/customer/' . $featured_new_name;
        }
        $iconpath = '';
        if ($request->hasFile('icon')) {
            $iconpath = $request->file('icon')->store('icons', 'public');
        }
        $now = Carbon::now();
        $store_branches_data = $store_branches->create([
            'address'=> $request->address,
            'description'=> $request->description,
            'name_en'=> $request->name_en,
            'name_kh'=>$request->name_kh,
            'date_of_birth'=>$request->date_of_birth,
            'nationality'=>$request->nationality,
            'image'=>$featured_new_name,
            'icon'=>$iconpath,
            'created_at' => $now,
        ]);
      return response()->json([
        'massage' => 'Succssfully',
        'data_branches'=> $store_branches_data
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

    public function update(Request $request, $id)
    {
        $update_branches = Branches::find($id);
         $imagepath = $update_branches->image;
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('images', 'public');
        }
        $iconpath = $update_branches->icon;
        if ($request->hasFile('icon')) {
            $iconpath = $request->file('icon')->store('icons', 'public');
        }
        $updated_at = Carbon::now();
        $update_branches->update([
            'address'        => $request->address,
            'description'    => $request->description, 
            'name_en'        => $request->name_en,
            'name_kh'        => $request->name_kh, 
            'owner_name_en'  => $request->owner_name_en,
            'owner_name_kh'  => $request->owner_name_kh,
            'owner_title_en' => $request->owner_title_en,
            'owner_title_kh' => $request->owner_title_kh,
            'sex'            => $request->sex,
            'date_of_birth'  => $request->date_of_birth,
            'nationality'    => $request->nationality,
            'image'          => $imagepath,
            'icon'           => $iconpath,
            'updated_at'     => $updated_at,
        ]);
      return response()->json([
        'massage' => 'Update Succssfully'
      ],200);
    }
    public function destroy(string $id)
    {
        $delete_branches = Branches::find($id);
        if (!$delete_branches){
            return response()->json(["massage" => "Branches not found"],404);
        }
        if ($delete_branches->image && file_exists(public_path($delete_branches->image))) {
            unlink(public_path($delete_branches->image));
        }
        if ($delete_branches->icon && file_exists(public_path($delete_branches->icon))) {
            unlink(public_path($delete_branches->icon));
        }
        $delete_branches->delete();

        return response()->json(["massage"=>"Delete Branches successfully"]);
    }
}
