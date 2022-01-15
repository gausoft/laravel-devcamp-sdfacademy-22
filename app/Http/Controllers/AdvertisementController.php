<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function show($slug)
    {
        $advertisement = Advertisement::whereSlug($slug)->first();
        if (!$advertisement) {
            abort(404);
        }
        return view('pages.advertisement-details', compact('advertisement'));
    }
}
