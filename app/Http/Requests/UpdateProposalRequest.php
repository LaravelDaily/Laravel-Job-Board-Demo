<?php

namespace App\Http\Requests;

use App\Proposal;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('proposal_edit');
    }

    public function rules()
    {
        return [
            'proposal_text' => [
                'required',
            ],
        ];
    }
}
