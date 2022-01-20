<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;

class DashboardController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::where('advertiser_id', auth()->id())
                                        ->paginate(6);
        return view('pages.dashboard', compact('advertisements'));
    }
}
