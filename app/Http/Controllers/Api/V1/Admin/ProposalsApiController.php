<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Proposal;

class ProposalsApiController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();

        return $proposals;
    }

    public function store(StoreProposalRequest $request)
    {
        return Proposal::create($request->all());
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        return $proposal->update($request->all());
    }

    public function show(Proposal $proposal)
    {
        return $proposal;
    }

    public function destroy(Proposal $proposal)
    {
        return $proposal->delete();
    }
}
