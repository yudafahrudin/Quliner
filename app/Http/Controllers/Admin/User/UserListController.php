<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserListController extends Controller
{
    public function show(Request $request) {

        $userAll = User::all()->sortByDesc('updated_at');
        
        if($request->ajax()) {
           return $userAll->toJson();
        }

        return view('admin.users.showListUser', array(
            'userAll' => $userAll,
            'listNomor' => 1,
            'title' => 'User')
        );
    }

}
