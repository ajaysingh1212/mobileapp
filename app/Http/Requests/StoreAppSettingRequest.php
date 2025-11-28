<?php

namespace App\Http\Requests;

use App\Models\AppSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_setting_create');
    }

    public function rules()
    {
        return [
            'logo' => [
                'required',
            ],
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
