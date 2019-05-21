<?php

namespace App\Http\Requests;

use App\Proposal;
use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('proposal_create');
    }

    public function rules()
    {
        return [
            'job_id'        => [
                'required',
                'integer',
            ],
            'proposal_text' => [
                'required',
            ],
        ];
    }
}
