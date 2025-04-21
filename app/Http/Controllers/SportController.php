<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::with('location')->get();
        return view('sports.index', compact('sports'));
    }
    public function userSports()
    {
        $sports = Sport::all();  // Fetch all sports
        return view('Users.sports', ['sports' => $sports]);
    }
    public function create()
    {
        $locations = Location::all();
        return view('sports.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules());

        $validatedData['image'] = $this->handleImageUpload($request);

        Sport::create($validatedData);

        return redirect()->route('sports.index')->with('success', 'Sport created successfully.');
    }

    public function edit(Sport $sport)
    {
        $locations = Location::all();
        return view('sports.edit', compact('sport', 'locations'));
    }

    public function update(Request $request, Sport $sport)
    {
        $validatedData = $request->validate($this->validationRules());

        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->handleImageUpload($request, $sport->image);
        }

        $sport->update($validatedData);

        return redirect()->route('sports.index')->with('success', 'Sport updated successfully.');
    }

    public function destroy(Sport $sport)
    {
        if ($sport->image) {
            Storage::delete('public/' . $sport->image);
        }
        $sport->delete();

        return redirect()->route('sports.index')->with('success', 'Sport deleted successfully.');
    }

    private function validationRules()
    {
        return [
            'name' => 'required',
            'max_players' => 'required|numeric',
            'min_players' => 'required|numeric',
            'location_id' => 'required|exists:locations,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    private function handleImageUpload(Request $request, $existingImagePath = null)
    {
        if ($existingImagePath) {
            Storage::delete('public/' . $existingImagePath);
        }

        return $request->hasFile('image')
            ? $request->file('image')->store('sports', 'public')
            : $existingImagePath;
    }
}
