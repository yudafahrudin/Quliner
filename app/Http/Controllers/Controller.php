<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct($manuallyMiddleware = array()) {
        // If we only set up some midleware
        if (count($manuallyMiddleware) != 0) {
            foreach ($manuallyMiddleware as $key) {
                $this->middleware($key);
            }
        } elseif (count($manuallyMiddleware) == 0 ) {
            // Nothing to do
        } else {
            $this->middleware('auth');
            $this->middleware('checklang');
        }
    }

}
