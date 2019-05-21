@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.proposal.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.job') }}
                                </th>
                                <td>
                                    {{ $proposal->job->title ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.candidate') }}
                                </th>
                                <td>
                                    {{ $proposal->candidate->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.proposal_text') }}
                                </th>
                                <td>
                                    {!! $proposal->proposal_text !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.budget') }}
                                </th>
                                <td>
                                    {{ $proposal->budget }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.delivery_time') }}
                                </th>
                                <td>
                                    {{ $proposal->delivery_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.proposal.fields.attachments') }}
                                </th>
                                <td>
                                    {{ $proposal->attachments }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection