@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('global.country.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.countries.update", [$country->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('global.country.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($country) ? $country->name : '') }}">
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.country.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('short_code') ? 'has-error' : '' }}">
                            <label for="short_code">{{ trans('global.country.fields.short_code') }}*</label>
                            <input type="text" id="short_code" name="short_code" class="form-control" value="{{ old('short_code', isset($country) ? $country->short_code : '') }}">
                            @if($errors->has('short_code'))
                                <p class="help-block">
                                    {{ $errors->first('short_code') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.country.fields.short_code_helper') }}
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