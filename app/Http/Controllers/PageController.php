<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the home page.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the about us page.
     */
    public function about()
    {
        return view('users.about-us');
    }

    /**
     * Show the sports page with data.
     */
    public function sports()
    {
        $sports = \App\Models\Sport::all(); // Fetch sports data from the database
        return view('users.sports-page', compact('sports'));
    }

    /**
     * Show the events page.
     */
    public function events()
    {
        return view('users.events');
    }

    /**
     * Show the contact us page.
     */
    public function contact()
    {
        return view('users.contact');
    }
}
