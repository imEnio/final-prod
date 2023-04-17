<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index(){
        return view('admin.pages.cities.cities');

    }
}
