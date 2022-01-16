<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';

        return [
            //
            'billing_name' => 'required',
            'billing_email' => $emailValidation,
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billinng_country' => 'required',
            'billing_phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You already have an account with this email. Please login to continue'
        ]
    }
}
