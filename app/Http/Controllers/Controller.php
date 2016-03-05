<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $countries = Country::all();
        return view('index',  ['countries' => $countries]);
    }

    public function getCities()
    {
        /** @var \App\Country $country */
        $country = Country::find(Input::get('country_id'));

        if (!is_null($country)) {
            $data = [
                'cities' => $country->cities()->getResults(),
                'country_name' => $country->name,
            ];

            return response()->json($data);
        }

        return response('', 500);
    }

    public function store()
    {
        /** @var \App\Country $country */
        $country = Country::find(Input::get('country_id'))->first();

        if (!is_null($country)) {
            $city = new City();
            $city->country()->associate($country);
            $city->name = Input::get("name");
            $city->save();

            return response()->json($country->cities()->getResults());
        }

        return response('', 500);
    }
}
