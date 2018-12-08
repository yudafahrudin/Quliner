<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index() {
        
        $LocationData = [];

        if (Auth::check()) {
            $LocationData = ['name' => Auth::user()->name, 'email' => Auth::user()->email];
        }
		return view('location', $LocationData);
    }
}
