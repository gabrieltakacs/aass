<?php
/**
 * Created by Gabriel Takács, gabriel.takacs@ui42.sk
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class CitiesController extends Controller
{
    public function index()
    {
        $countries = \App\Country::all();

        return [
            'countries' => $countries
        ];
    }

    public function cities()
    {
        /** @var \App\Country $country */
        $country = \App\Country::find(Input::get('country_id'));

        if (!is_null($country)) {
            $data = [
                'cities' => $country->cities()->getResults(),
                'country_name' => $country->name,
            ];

            return $data;
        }

        throw new \Exception('Invalid country ID!');
    }

    public function store()
    {
        /** @var \App\Country $country */
        $country = \App\Country::where('id', '=' ,Input::get('country_id'))->first();

        if (!is_null($country)) {
            $city = new \App\City();
            $city->country()->associate($country);
            $city->name = Input::get("name");
            $city->save();

            return $country->cities()->getResults();
        }

        throw new \Exception('Invalid country ID!');
    }
}