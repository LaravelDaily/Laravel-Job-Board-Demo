@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.job.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.employer') }}
                                </th>
                                <td>
                                    {{ $job->employer->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.candidate') }}
                                </th>
                                <td>
                                    {{ $job->candidate->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.title') }}
                                </th>
                                <td>
                                    {{ $job->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.description') }}
                                </th>
                                <td>
                                    {!! $job->description !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.budget') }}
                                </th>
                                <td>
                                    {{ $job->budget }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.attachments') }}
                                </th>
                                <td>
                                    {{ $job->attachments }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.job.fields.delivery_date') }}
                                </th>
                                <td>
                                    {{ $job->delivery_date }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.proposal.title') }}
                </div>
                <div class="panel-body">

                    <table class=" table table-bordered table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th>
                                {{ trans('global.proposal.fields.candidate') }}
                            </th>
                            <th>
                                {{ trans('global.proposal.fields.proposal_text') }}
                            </th>
                            <th>
                                {{ trans('global.proposal.fields.budget') }}
                            </th>
                            <th>
                                {{ trans('global.proposal.fields.delivery_time') }}
                            </th>
                            <th>
                                {{ trans('global.proposal.fields.attachments') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job->proposals as $key => $proposal)
                            <tr data-entry-id="{{ $proposal->id }}">
                                <td>
                                    {{ $proposal->candidate->name ?? '' }}
                                </td>
                                <td>
                                    {{ $proposal->proposal_text ?? '' }}
                                </td>
                                <td>
                                    {{ $proposal->budget ?? '' }}
                                </td>
                                <td>
                                    {{ $proposal->delivery_time ?? '' }}
                                </td>
                                <td>
                                    @if($proposal->attachments)
                                        @foreach($proposal->attachments as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('job_create')
                                        <form action="{{ route("admin.jobs.update", [$job->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="candidate_id" value="{{ $proposal->candidate_id }}" />
                                            <input type="submit" class="btn btn-xs btn-primary"
                                                   value="{{ trans('global.job.hire_this_candidate') }}" />
                                        </form>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection