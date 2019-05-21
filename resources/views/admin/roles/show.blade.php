@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.role.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.role.fields.title') }}
                                </th>
                                <td>
                                    {{ $role->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Permissions
                                </th>
                                <td>
                                    @foreach($role->permissions as $id => $permissions)
                                        <span class="label label-info label-many">{{ $permissions->title }}</span>
                                    @endforeach
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