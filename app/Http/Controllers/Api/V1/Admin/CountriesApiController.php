<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountriesApiController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return $countries;
    }

    public function store(StoreCountryRequest $request)
    {
        return Country::create($request->all());
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        return $country->update($request->all());
    }

    public function show(Country $country)
    {
        return $country;
    }

    public function destroy(Country $country)
    {
        return $country->delete();
    }
}
