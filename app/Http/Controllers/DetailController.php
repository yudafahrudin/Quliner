<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Foodhome;

class DetailController extends Controller
{
    public function index($uri) {
        
        $detailData = [];
         $categoryFoodhome = Foodhome::where('url', $uri)->get();
        
        if (Auth::check()) {
            $detailData = ['name' => Auth::user()->name , 'detailFoodhome' => $categoryFoodhome[0]];
        }else{
            $detailData = ['detailFoodhome' => $categoryFoodhome[0]];
        }
        return view('detail', $detailData);
    }
}
