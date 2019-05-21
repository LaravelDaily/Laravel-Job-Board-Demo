<?php

namespace App\Http\Requests;

use App\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyCountryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('country_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:countries,id',
        ];
    }
}
