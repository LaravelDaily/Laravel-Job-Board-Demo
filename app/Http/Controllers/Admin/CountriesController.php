<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCountryRequest;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountriesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('country_access'), 403);

        $countries = Country::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('country_create'), 403);

        return view('admin.countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        abort_unless(\Gate::allows('country_create'), 403);

        $country = Country::create($request->all());

        return redirect()->route('admin.countries.index');
    }

    public function edit(Country $country)
    {
        abort_unless(\Gate::allows('country_edit'), 403);

        return view('admin.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        abort_unless(\Gate::allows('country_edit'), 403);

        $country->update($request->all());

        return redirect()->route('admin.countries.index');
    }

    public function show(Country $country)
    {
        abort_unless(\Gate::allows('country_show'), 403);

        return view('admin.countries.show', compact('country'));
    }

    public function destroy(Country $country)
    {
        abort_unless(\Gate::allows('country_delete'), 403);

        $country->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountryRequest $request)
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
