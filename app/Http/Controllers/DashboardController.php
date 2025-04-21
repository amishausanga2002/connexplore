<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user(); // Retrieve the authenticated user
        return view('dashboard', compact('user')); // Pass 'user' to the dashboard view
    }
}
