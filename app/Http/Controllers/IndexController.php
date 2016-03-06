<?php
/**
 * Created by Gabriel Takács, gabriel.takacs@ui42.sk
 */

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }
}