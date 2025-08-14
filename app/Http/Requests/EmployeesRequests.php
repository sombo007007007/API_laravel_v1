<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Id_card' => 'required',
            'name_kh_emp'=>'required',
            'name_en_emp'=>'required',
            'date_of_brithdy'=>'required',
            'identity'=>'required',
            'sex'=>'required',
            'provi_id'=>'required',
            'distr_id'=>'required',
            'commu_id'=>'required',
            'villag_id'=>'required',
            'branch_id'=>'required',
        ];
    }
}
