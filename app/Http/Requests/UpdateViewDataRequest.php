<?php

namespace App\Http\Requests;

use App\Models\ViewData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateViewDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('view_data_edit');
    }

    public function rules()
    {
        return [];
    }
}
