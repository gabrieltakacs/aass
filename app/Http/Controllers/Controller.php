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

    public function store(){

        $city=new City();

        if(Input::has('country_id'))
            $city->country_id = Input::get("country_id");

        if(Input::has('name'))
            $city->name = Input::get("name");

        $city->save();

        return self::index();
    }
}
