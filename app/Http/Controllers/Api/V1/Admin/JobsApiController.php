<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;

class JobsApiController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return $jobs;
    }

    public function store(StoreJobRequest $request)
    {
        return Job::create($request->all());
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        return $job->update($request->all());
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function destroy(Job $job)
    {
        return $job->delete();
    }
}
