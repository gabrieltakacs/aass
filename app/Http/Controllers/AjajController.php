<?php
/**
 * Created by Gabriel Takács, gabriel.takacs@ui42.sk
 */

namespace App\Http\Controllers;

class AjajController extends CitiesController
{
    public function index()
    {
        $data = parent::index();

        return view('index-ajaj', $data);
    }

    public function cities()
    {
        try {
            $data = parent::cities();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        return response()->json($data);
    }

    public function store()
    {
        try {
            $data = parent::store();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        return response()->json($data);
    }
}