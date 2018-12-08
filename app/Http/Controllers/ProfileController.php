<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function index() {
        
        $profileData = [];

        if (Auth::check()) {
            $profileData = [
                'name' => Auth::user()->name, 
                'email' => Auth::user()->email,
                'image' => Auth::user()->photo_thumb,
                'description' => Auth::user()->description,
                    ];
        }
		return view('profile', $profileData);
    }

}
