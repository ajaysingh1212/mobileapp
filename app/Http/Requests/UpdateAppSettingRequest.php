<?php

namespace App\Http\Requests;

use App\Models\AppSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_setting_edit');
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
