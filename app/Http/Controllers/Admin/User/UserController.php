<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Traits\UploadImage;

class UserController extends Controller {

    use UploadImage;

    protected function validatorImage(array $data) {
        return Validator::make($data, [
                    'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
    }

    protected function validator(array $data, $type = null) {

        $validator_requrement = [
            'name' => 'string|max:255',
        ];

        $email_check = array_get($data, 'email');

        $email_valid_array = ['email' => 'required|string|email|max:255|unique:users'];

        if (!$email_check == null) {
            $validator_requrement = array_merge($validator_requrement, $email_valid_array);
        }

        return Validator::make($data, $validator_requrement);
    }

    public function showEdit($id) {
        $user = User::find($id);
        return view('users.edit', array('title' => 'User', 'user_edit' => $user));
    }

    public function showDetailUser($username) {
        $userFind = User::where('email', $username)->get();

        return view('admin.users.showUserDetail', array(
            'userFind' => $userFind[0],
            'title' => 'User')
        );
    }

    public function showProfileUser($username) {
        $userFind = User::where('email', $username)->get();

        return view('admin.users.detail', array(
            'userFind' => $userFind[0],
            'title' => $userFind[0]->name)
        );
    }

    protected function edit($id, Request $request) {
        //Initialize image file location folder
        $this->pathImageTemp = 'admin/user/images/profile/';
        
        $validator = $this->validator($request->all(), 'edit');
        if ($validator->fails()) {
            $response = array(
                'status' => 'error',
                'message' => $validator->messages(),
            );
            return response()->json($response);
        } else {
            $requestArray = $request->all();
            // store
            $user = User::find($id);
            $user->name = array_get($requestArray, 'name');
            $email = array_get($requestArray, 'email');
            ( $email ? $user->email = $email : '');
            $user->description = array_get($requestArray, 'description');
            if($request->has('photo')) {
                $this->saveImage($request);
                $user->photo_thumb = array_get($this->pathQuality, 'thumb');
                $user->photo_original = array_get($this->pathQuality, 'original');
            }
            $user->save();
            $response = array(
                'status' => 'success',
                'message' => 'User [' . object_get($user, 'name') . '] updated!',
            );
            return response()->json($response);
        }
    }

    protected function delete($user) {
        try {

            $user = User::find($user);
            $userName = object_get($user, 'name');
            $user->delete();

            return redirect(route('user.show'))->with('message', 'User [ ' . $userName . ' ] deleted')->with('status', 'success');
        } catch (ValidatorException $e) {
            return redirect(route('user.show'))->with('message', $e->getMessageBag());
        }
    }

}
