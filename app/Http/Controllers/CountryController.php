<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return CountryResource::collection(Country::all());
    }

    public function store(CountryRequest $request)
    {
        return new CountryResource(Country::create($request->validated()));
    }

    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return new CountryResource($country);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json();
    }
}
