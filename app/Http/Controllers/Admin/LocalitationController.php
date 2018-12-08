<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Cookie;
use Config;

class LocalitationController extends Controller
{
    /* GET : language/{lang}, name : language, This stuff is working for set the default language */

    public function setLocalitation($lang)
    {
        $oneWeek = Config::get('constants.dayToMinute.7');
        Cookie::queue(Cookie::make('lang', $lang, $oneWeek));
        return redirect()->route('admin.dashboard');
    }

}
