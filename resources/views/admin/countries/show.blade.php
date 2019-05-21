@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.country.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.country.fields.name') }}
                                </th>
                                <td>
                                    {{ $country->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.country.fields.short_code') }}
                                </th>
                                <td>
                                    {{ $country->short_code }}
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