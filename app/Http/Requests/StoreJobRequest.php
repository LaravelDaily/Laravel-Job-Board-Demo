<?php

namespace App\Http\Requests;

use App\Job;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('job_create');
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'description'   => [
                'required',
            ],
            'budget'        => [
                'required',
            ],
            'delivery_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
