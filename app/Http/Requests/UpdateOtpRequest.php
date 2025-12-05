<?php

namespace App\Http\Requests;

use App\Models\Otp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOtpRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('otp_edit');
    }

    public function rules()
    {
        return [];
    }
}
