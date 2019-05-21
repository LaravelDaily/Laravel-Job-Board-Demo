@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('global.job.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.jobs.update", [$job->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('candidate_id') ? 'has-error' : '' }}">
                            <label for="candidate">{{ trans('global.job.fields.candidate') }}</label>
                            <select name="candidate_id" id="candidate" class="form-control select2">
                                @foreach($candidates as $id => $candidate)
                                    <option value="{{ $id }}" {{ (isset($job) && $job->candidate ? $job->candidate->id : old('candidate_id')) == $id ? 'selected' : '' }}>{{ $candidate }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('candidate_id'))
                                <p class="help-block">
                                    {{ $errors->first('candidate_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('global.job.fields.title') }}*</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($job) ? $job->title : '') }}">
                            @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.job.fields.title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('global.job.fields.description') }}*</label>
                            <textarea id="description" name="description" class="form-control ">{{ old('description', isset($job) ? $job->description : '') }}</textarea>
                            @if($errors->has('description'))
                                <p class="help-block">
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.job.fields.description_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                            <label for="budget">{{ trans('global.job.fields.budget') }}*</label>
                            <input type="text" id="budget" name="budget" class="form-control" value="{{ old('budget', isset($job) ? $job->budget : '') }}">
                            @if($errors->has('budget'))
                                <p class="help-block">
                                    {{ $errors->first('budget') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.job.fields.budget_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                            <label for="attachments">{{ trans('global.job.fields.attachments') }}</label>
                            <div class="needsclick dropzone" id="attachments-dropzone">

                            </div>
                            @if($errors->has('attachments'))
                                <p class="help-block">
                                    {{ $errors->first('attachments') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.job.fields.attachments_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('delivery_date') ? 'has-error' : '' }}">
                            <label for="delivery_date">{{ trans('global.job.fields.delivery_date') }}</label>
                            <input type="text" id="delivery_date" name="delivery_date" class="form-control date" value="{{ old('delivery_date', isset($job) ? $job->delivery_date : '') }}">
                            @if($errors->has('delivery_date'))
                                <p class="help-block">
                                    {{ $errors->first('delivery_date') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.job.fields.delivery_date_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.jobs.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($job) && $job->attachments)
          var files =
            {!! json_encode($job->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    }
}
</script>
@stop