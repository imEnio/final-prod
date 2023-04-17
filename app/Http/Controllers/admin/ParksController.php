<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Park;

class ParksController extends Controller
{
    public function index(){
        $parks = Park::with('city')->get();

        $cities = City::all();
        return view('admin.pages.parks.parks', ['parks' => $parks, "cities" => $cities]);
    }
}
