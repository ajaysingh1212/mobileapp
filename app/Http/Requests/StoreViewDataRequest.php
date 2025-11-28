<?php

namespace App\Http\Requests;

use App\Models\ViewData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreViewDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('view_data_create');
    }

    public function rules()
    {
        return [];
    }
}
