<?php
/**
 * Created by Gabriel Takács, gabriel.takacs@ui42.sk
 */

namespace App\Http\Controllers;

class AjaxController extends CitiesController
{
    public function index()
    {
        $data = parent::index();

        return view('index-ajax', $data);
    }

    public function cities()
    {
        try {
            $data = parent::cities();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        $xml = new \SimpleXMLElement('<data></data>');
        $xml->addAttribute('country_name', $data['country_name']);
        foreach ($data['cities'] as $city) {
            $child = $xml->addChild('city', $city->name);
            $child->addAttribute('id', $city->id);
        }

        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }

    public function store()
    {
        try {
            $data = parent::store();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        $xml = new \SimpleXMLElement('<data></data>');
        foreach ($data as $city) {
            $child = $xml->addChild('city', $city->name);
            $child->addAttribute('id', $city->id);
        }

        error_log($xml->asXML());

        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }
}