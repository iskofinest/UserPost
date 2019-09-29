<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {
        $user = Auth::user();
        if ($user) { // check if user already logged in
            return redirect('/home'); // id logged in, then automatically proceeds to home
        } else {
            return view('login'); // if not logged in, proceed to log in form
        }
    }

    public function authenticateUser(Request $request) {
        // validate first the request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:20', // references on the input field name attribute
            'password' => 'required|string'
        ]);

        // if validator denied request then go back to login and send error response
        if($validator->fails()) {
            $errors = $validator->errors()->messages();
            return redirect()->back()->withErrors($errors);
        }

        // if validator accept request then proceed to database validation part
        $username = $request->username; // get the username input of the user
        $password = $request->password; // get the password input of the user

        // place the user credentials on an array
        $credentials = [
            'username' => $username,
            'password' => $password
        ];

        // pass the array of credentials to Auth::attempt function
        // Auth::attempt is a ready made function from Laravel library
        if(Auth::attempt($credentials)) {
            return redirect("/home"); // if authenticated, then proceed to homepage
        } else {
            // if not authenticated then go back to login form and send error response
            return redirect()->back()->withErrors(['error' => 'INVALID CREDENTIALS']);
        }

    }

    public function logout() {
        session()->flush(); // delete all to data saved on the current session
        return redirect('/');
    }
}
