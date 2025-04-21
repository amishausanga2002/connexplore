<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEquipmentReport;
use Illuminate\Support\Facades\Auth;

class UserEquipmentReportController extends Controller
{
    /**
     * Show reports submitted by the logged-in user only
     */
    public function index()
    {
        // ✅ Fetch only reports where user_id matches the logged-in user
        $reports = UserEquipmentReport::where('user_id', Auth::id())->get();

        return view('user_equipment_reports.index', compact('reports'));
    }

    /**
     * Show the create report form
     */
    public function create()
    {
        return view('user_equipment_reports.create');
    }

    /**
     * Store a new equipment damage/loss report
     */
    public function store(Request $request)
    {
        $request->validate([
            'cb_number' => 'required|string',
            'incident_date' => 'required|date',
            'incident_time' => 'required',
            'reported_on' => 'required|date',
            'location' => 'required|string',
            'sport_name' => 'required|string',
            'equipment_name' => 'required|string',
            'loss_description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_loss_images', 'public');
        }

        UserEquipmentReport::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? Auth::user()->email,
            'cb_number' => $request->cb_number,
            'incident_date' => $request->incident_date,
            'incident_time' => $request->incident_time,
            'reported_on' => $request->reported_on,
            'location' => $request->location,
            'sport_name' => $request->sport_name,
            'equipment_name' => $request->equipment_name,
            'loss_description' => $request->loss_description,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Damage/Loss report submitted successfully.');
    }
}
