<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // $rules = [];
        // // Lấy ra các phương thức đang hoạt động
        // $curentAction = $this->route()->getActionMethod();
        // switch ($this->method()) :
        //     case 'POST' :
        //         switch ($curentAction) :
        //             case 'submitFormEdit' :
        //                 $rules = [
        //                     'username' => "required",
        //                     'fullname' => "required",
        //                     'email' => "required|email",
        //                     'address' => "required",
        //                     'phone_number' => "required",
        //                     'password' => "required|min:8|max:32",
        //                     'new_password' => "min:8|max:32",
        //                     'role' => "required"
        //                 ];
        //         endswitch;
        // endswitch;
        // return $rules;

        return [
            'username' => "required",
            'fullname' => "required",
            'email' => "required|email",
            'address' => "required",
            'phone_number' => "required",
            'password' => "required|min:8|max:32",
            'new_password' => "min:8|max:32",
            'role' => "required"
        ];
    }
}
