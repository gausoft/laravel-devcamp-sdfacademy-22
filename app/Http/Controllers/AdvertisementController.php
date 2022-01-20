<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    public function create()
    {
        return view('pages.advertisement-create');
    }

    public function show($slug)
    {
        $advertisement = Advertisement::whereSlug($slug)->first();
        if (!$advertisement) {
            abort(404);
        }
        return view('pages.advertisement-details', compact('advertisement'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label' => ['required', 'string', 'max:255', 'unique:advertisements'],
            'image' => ['required', 'image', 'max:1024'],
            'description' => ['required', 'string', 'min:100'],
            'cost' => ['required', 'numeric'],
            'deposit' => ['required', 'numeric'],
            'city' => ['required', 'string', 'max:25'],
            'street' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $validated['advertiser_id'] = auth()->id();
        $validated['image'] = $request->file('image')->store('advertisements', 'public');

        Advertisement::create($validated);

        return redirect('/')->with('Success');
    }

    public function edit(Advertisement $advertisement)
    {
        return view('pages.advertisement-update', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $validator = Validator::make($request->all(), [
            'label' => ['required', 'string', 'max:255'],
            'image' => ['image', 'max:1024'],
            'description' => ['required', 'string', 'min:100'],
            'cost' => ['required', 'numeric'],
            'deposit' => ['required', 'numeric'],
            'city' => ['required', 'string', 'max:25'],
            'street' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($advertisement->image);//Remove old omage
            $validated['image'] = $request->file('image')->store('advertisements', 'public');
        }

        $validated['advertiser_id'] = auth()->id();
        $advertisement->update($validated);

        return redirect('/dashboard')->with('message', 'Mise à jour effectuée avec succès!');
    }

    public function delete(Advertisement $advertisement)
    {
        $advertisement->delete();
        return back()->with('message', 'Suppression réussie');
    }
}
