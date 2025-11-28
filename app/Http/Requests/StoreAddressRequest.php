<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_create');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'father_name' => [
                'string',
                'nullable',
            ],
            'mother_name' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'email' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'alternate_number' => [
                'string',
                'nullable',
            ],
            'pin_code' => [
                'string',
                'min:6',
                'max:6',
                'required',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'debit_card' => [
                'string',
                'min:16',
                'max:16',
                'nullable',
            ],
            'expiry_month' => [
                'string',
                'nullable',
            ],
            'cvv' => [
                'string',
                'nullable',
            ],
            'customer' => [
                'string',
                'required',
            ],
            'password' => [
                'string',
                'required',
            ],
        ];
    }
}
