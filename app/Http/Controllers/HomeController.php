<?php

namespace App\Http\Controllers;

use App\Foodhome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function index() {
        $homeData = [];
        $categoryFoodhome = Foodhome::skip(0)->take(4)->get();

        if (Auth::check()) {
            $homeData = ['name' => Auth::user()->name, 'category' => $categoryFoodhome];
        } else {
            $homeData = ['category' => $categoryFoodhome,'id'=>0];
        }
//        $i = 0;
//        foreach ($categoryFoodhome as $value){
//            print_r($value->images[$i]->url);
//            $i++;
//        }

        return view('home', $homeData);
    }

}
