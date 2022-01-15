<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;

class HomeController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('pages.home', compact('advertisements'));
    }
}
