<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        //validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], 
            //confirmed => check the password confirmation, to make it work, the attribute must be password and then _confirmation
        ]);

        //create user in db
        $user = User::create($attributes);

        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');

    }

}
