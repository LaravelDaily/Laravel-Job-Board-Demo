@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.user.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.user.fields.name') }}
                                </th>
                                <td>
                                    {{ $user->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.user.fields.email') }}
                                </th>
                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.user.fields.email_verified_at') }}
                                </th>
                                <td>
                                    {{ $user->email_verified_at }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Roles
                                </th>
                                <td>
                                    @foreach($user->roles as $id => $roles)
                                        <span class="label label-info label-many">{{ $roles->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.user.fields.about') }}
                                </th>
                                <td>
                                    {!! $user->about !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.user.fields.country') }}
                                </th>
                                <td>
                                    {{ $user->country->name ?? '' }}
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