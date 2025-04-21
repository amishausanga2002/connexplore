<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function storeEmail(Request $request)
{
    $request->validate(['email' => 'required|email|unique:approved_emails,email']);
    \App\Models\ApprovedEmail::create(['email' => $request->email]);
    return back()->with('status', 'Email added successfully!');
}
}
