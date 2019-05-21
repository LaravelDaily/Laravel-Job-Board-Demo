<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\Proposal;
use App\User;

class JobsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('job_access'), 403);

        if (auth()->user()->isEmployer()) {
            $jobs = Job::with('proposals')->where('employer_id', auth()->id())->get();
        } else {
            $jobs = Job::whereNull('candidate_id')->get();
        }

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('job_create'), 403);

        return view('admin.jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        abort_unless(\Gate::allows('job_create'), 403);

        $data = $request->all();
        $data['employer_id'] = auth()->id();
        $job = Job::create($data);

        foreach ($request->input('attachments', []) as $file) {
            $job->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {
        abort_unless(\Gate::allows('job_edit'), 403);

        if ($job->employer_id != auth()->id()) {
            abort(404);
        }

        $candidates = User::whereHas('roles', function($query) {
            return $query->where('id', 3);
        })->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job->load('candidate');

        return view('admin.jobs.edit', compact('candidates', 'job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        abort_unless(\Gate::allows('job_edit'), 403);

        if ($job->employer_id != auth()->id()) {
            abort(404);
        }

        $job->update($request->all());

        if (isset($request->candidate_id)) {
            Proposal::where('job_id', $job->id)->where('candidate_id', $request->candidate_id)
                ->update(['approved_at' => now()]);
            Proposal::where('job_id', $job->id)->where('candidate_id', '!=', $request->candidate_id)
                ->update(['rejected_at' => now()]);
        }

        if (count($job->attachments) > 0) {
            foreach ($job->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }

        $media = $job->attachments->pluck('file_name')->toArray();

        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $job->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        abort_unless(\Gate::allows('job_show'), 403);

        if ($job->employer_id != auth()->id()) {
            abort(404);
        }

        $job->load(['employer', 'candidate', 'proposals']);

        return view('admin.jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        abort_unless(\Gate::allows('job_delete'), 403);

        if ($job->employer_id != auth()->id()) {
            abort(404);
        }

        $job->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequest $request)
    {
        Job::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
