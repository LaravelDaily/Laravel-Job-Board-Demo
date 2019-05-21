<?php

namespace App\Http\Requests;

use App\Proposal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProposalRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('proposal_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:proposals,id',
        ];
    }
}
