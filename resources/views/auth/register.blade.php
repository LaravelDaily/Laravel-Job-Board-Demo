@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            {{ trans('global.site_title') }}
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            {{ trans('global.register') }}
        </p>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div>
                <div class="form-group has-feedback">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="radio" name="role_id" value="2" checked>
                            Employer
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="role_id" value="3">
                            Candidate
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" required="required"="autofocus" placeholder="{{ trans('global.user_name') }}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" required="required" placeholder="{{ trans('global.login_email') }}">
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" required="required" placeholder="{{ trans('global.login_password') }}">
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{ trans('global.login_password_confirmation') }}">
                    @if($errors->has('password_confirmation'))
                        <p class="help-block">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <select name="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <textarea class="form-control" name="about" placeholder="About me" rows="5"></textarea>
                    @if($errors->has('about'))
                        <p class="help-block">
                            {{ $errors->first('about') }}
                        </p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection