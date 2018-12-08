<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Foodhome;

class listController extends Controller {

    
    public function index() {
        $listData = [];
        // Get all list foodhome / cafe
        $listFoodhome = Foodhome::all();
        
        if (Auth::check()) {
            $listData = ['name' => Auth::user()->name , 'listFoodhome' => $listFoodhome];
        }else{
            $listData = ['listFoodhome' => $listFoodhome];
        }
        return view('list', $listData);
    }

}
