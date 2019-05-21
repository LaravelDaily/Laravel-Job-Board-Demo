@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('global.proposal.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.proposals.update", [$proposal->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('proposal_text') ? 'has-error' : '' }}">
                            <label for="proposal_text">{{ trans('global.proposal.fields.proposal_text') }}*</label>
                            <textarea id="proposal_text" name="proposal_text" class="form-control ">{{ old('proposal_text', isset($proposal) ? $proposal->proposal_text : '') }}</textarea>
                            @if($errors->has('proposal_text'))
                                <p class="help-block">
                                    {{ $errors->first('proposal_text') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.proposal.fields.proposal_text_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                            <label for="budget">{{ trans('global.proposal.fields.budget') }}</label>
                            <input type="text" id="budget" name="budget" class="form-control" value="{{ old('budget', isset($proposal) ? $proposal->budget : '') }}">
                            @if($errors->has('budget'))
                                <p class="help-block">
                                    {{ $errors->first('budget') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.proposal.fields.budget_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('delivery_time') ? 'has-error' : '' }}">
                            <label for="delivery_time">{{ trans('global.proposal.fields.delivery_time') }}</label>
                            <input type="text" id="delivery_time" name="delivery_time" class="form-control" value="{{ old('delivery_time', isset($proposal) ? $proposal->delivery_time : '') }}">
                            @if($errors->has('delivery_time'))
                                <p class="help-block">
                                    {{ $errors->first('delivery_time') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.proposal.fields.delivery_time_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                            <label for="attachments">{{ trans('global.proposal.fields.attachments') }}</label>
                            <div class="needsclick dropzone" id="attachments-dropzone">

                            </div>
                            @if($errors->has('attachments'))
                                <p class="help-block">
                                    {{ $errors->first('attachments') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.proposal.fields.attachments_helper') }}
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
    url: '{{ route('admin.proposals.storeMedia') }}',
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
@if(isset($proposal) && $proposal->attachments)
          var files =
            {!! json_encode($proposal->attachments) !!}
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