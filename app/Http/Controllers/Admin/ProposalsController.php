<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProposalRequest;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Job;
use App\Proposal;
use App\User;

class ProposalsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('proposal_access'), 403);

        $proposals = Proposal::where('candidate_id', auth()->id())->get();

        return view('admin.proposals.index', compact('proposals'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('proposal_create'), 403);

        return view('admin.proposals.create', compact('jobs', 'candidates'));
    }

    public function store(StoreProposalRequest $request)
    {
        abort_unless(\Gate::allows('proposal_create'), 403);

        $proposal = Proposal::create($request->all() + ['candidate_id' => auth()->id()]);

        foreach ($request->input('attachments', []) as $file) {
            $proposal->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->route('admin.proposals.index');
    }

    public function edit(Proposal $proposal)
    {
        abort_unless(\Gate::allows('proposal_edit'), 403);

        return view('admin.proposals.edit', compact('proposal'));
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        abort_unless(\Gate::allows('proposal_edit'), 403);

        $proposal->update($request->all());

        if (count($proposal->attachments) > 0) {
            foreach ($proposal->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }

        $media = $proposal->attachments->pluck('file_name')->toArray();

        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $proposal->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.proposals.index');
    }

    public function show(Proposal $proposal)
    {
        abort_unless(\Gate::allows('proposal_show'), 403);

        $proposal->load('job', 'candidate');

        return view('admin.proposals.show', compact('proposal'));
    }

    public function destroy(Proposal $proposal)
    {
        abort_unless(\Gate::allows('proposal_delete'), 403);

        $proposal->delete();

        return back();
    }

    public function massDestroy(MassDestroyProposalRequest $request)
    {
        Proposal::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
