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
            {{ trans('global.login') }}
        </p>
        @if(\Session::has('message'))
            <p class="alert alert-info">
                {{ \Session::get('message') }}
            </p>
        @endif
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" required="required" placeholder="{{ trans('global.login_email') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" required="required"="autofocus"="" placeholder="{{ trans('global.login_password') }}">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">{{ trans('global.remember_me') }}</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ trans('global.login') }}
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ route('password.request') }}">
            {{ trans('global.forgot_password') }}
        </a>
        <a href="{{ route('register') }}">
            {{ trans('global.register') }}
        </a>

    </div>
</div>
@endsection