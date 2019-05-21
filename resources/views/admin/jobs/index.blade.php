@extends('layouts.admin')
@section('content')
<div class="content">
    @can('job_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.jobs.create") }}">
                    {{ trans('global.add') }} {{ trans('global.job.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.job.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    @if (!auth()->user()->isEmployer())
                                    <th>
                                        {{ trans('global.job.fields.employer') }}
                                    </th>
                                    @endif
                                    @if (!auth()->user()->isCandidate())
                                    <th>
                                        {{ trans('global.job.fields.candidate') }}
                                    </th>
                                    @endif
                                    <th>
                                        {{ trans('global.job.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('global.job.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('global.job.fields.budget') }}
                                    </th>
                                    <th>
                                        {{ trans('global.job.fields.attachments') }}
                                    </th>
                                    <th>
                                        {{ trans('global.job.fields.delivery_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $key => $job)
                                    <tr data-entry-id="{{ $job->id }}">
                                        <td>

                                        </td>
                                        @if (!auth()->user()->isEmployer())
                                        <td>
                                            {{ $job->employer->name ?? '' }}
                                        </td>
                                        @endif
                                        @if (!auth()->user()->isCandidate())
                                        <td>
                                            {{ $job->candidate->name ?? '' }}
                                        </td>
                                        @endif
                                        <td>
                                            {{ $job->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $job->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $job->budget ?? '' }}
                                        </td>
                                        <td>
                                            @if($job->attachments)
                                                @foreach($job->attachments as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        {{ trans('global.view_file') }}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ $job->delivery_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('job_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.jobs.show', $job->id) }}">
                                                    {{ trans('global.proposal.title') }} ({{ $job->proposals->count() }})
                                                </a>
                                            @endcan
                                            @can('job_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('job_delete')
                                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                            @if (auth()->user()->isCandidate())
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.proposals.create') }}?job_id={{ $job->id }}">
                                                    {{ trans('global.proposal.create') }}
                                                </a>
                                            @endif
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
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jobs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('job_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection