<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\EquipmentDamageReport;

class EquipmentDamageReportController extends Controller
{
    /**
     * Display a listing of all damage reports.
     */
    public function index()
    {
        $reports = EquipmentDamageReport::with('equipment')->get();
        return view('equipment_damage_reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new damage report.
     */
    public function create()
    {
        $equipment = Equipment::all();
        return view('equipment_damage_reports.create', compact('equipment'));
    }

    /**
     * Store a newly created damage report in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cb_number' => 'required',
            'incident_date' => 'required|date',
            'incident_time' => 'required',
            'reported_on' => 'required|date',
            'location' => 'required|string',
            'sport_name' => 'required|string',
            'equipment_id' => 'required|exists:equipment,id',
            'damage_details' => 'required',
            'images' => 'nullable|image|max:2048',
            'status' => 'required|string', // ✅ validate the status field
        ]);

        $imagePath = null;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('damage_images', 'public');
        }

        EquipmentDamageReport::create([
            'cb_number' => $request->cb_number,
            'incident_date' => $request->incident_date,
            'incident_time' => $request->incident_time,
            'reported_on' => $request->reported_on,
            'location' => $request->location,
            'sport_name' => $request->sport_name,
            'equipment_id' => $request->equipment_id,
            'damage_details' => $request->damage_details,
            'images' => $imagePath,
            'status' => $request->status, // ✅ save the selected status
        ]);

        return redirect()->route('damage-reports.index')->with('success', 'Damage report submitted successfully.');
    }

    /**
     * Update the status of a specific damage report.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $report = EquipmentDamageReport::findOrFail($id);
        $report->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
