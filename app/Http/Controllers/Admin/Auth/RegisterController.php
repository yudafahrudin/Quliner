<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Traits\UploadImage;

class RegisterController extends Controller {

    use RegistersUsers;
    use UploadImage;

    protected $redirectTo = '/admin/users';

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function validatorImage(array $data) {
        return Validator::make($data, [
                    'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
    }

    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'photo_thumb' => array_get($this->pathQuality, 'thumb'),
                    'photo_original' => array_get($this->pathQuality, 'original'),
                    'admin' => $data['isAdmin'],
                    'description' => $data['description'],
        ]);
    }

    protected function showRegistrationForm() {
        return view('auth.admins.register', array(
            'title' => 'Dashboard'));
    }

    public function register(Request $request) {
        $this->pathImageTemp = 'admin/user/images/profile/';
        $this->validator($request->all())->validate();
        $this->validatorImage($request->all())->validate();
        $this->saveImage($request);
        event(new Registered($user = $this->create($request->all())));
        //$this->guard()->login($user);
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function registered(Request $request, $user) {
        return redirect()->back()->with('message', 'User registration is success!');
    }

}
