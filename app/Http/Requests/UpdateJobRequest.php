<?php

namespace App\Http\Requests;

use App\Job;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('job_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
