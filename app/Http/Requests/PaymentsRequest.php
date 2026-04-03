<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PaymentsRequest extends FormRequest
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
            "table_id"=>"required",
            "menu_id"=>"required",
            "server_id"=>"required",
             "total_price"=>"required",
            "payment_type"=>"required",
            "payment_status"=>"required",
        ];
    }
    public function messages(): array
{
    return [


    ];
}
}
