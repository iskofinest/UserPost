<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller {

    public function show(Request $request, $id) {
        $user = User::where('id', '=', $id)
            ->first();

        $data = [
            'user' => $user
        ];

        return view('users/show')->with($data);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:50',
            'middlename' => 'string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|max:100',
            'username' => 'required|string|max:20',
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->messages();
            return redirect()->back()->withErrors($errors);
        }

        $user = User::where('id', '=', $id);
        $firstname = $request->firstname;
        $middlename = $request->middlename;
        $lastname = $request->lastname;
        $username = $request->username;
        $email = $request->email;

        // place to array the updated information of the user
        $updates = [
            'first_name' => $firstname,
            'middle_name' => $middlename,
            'last_name' => $lastname,
            'username' => $username,
            'email' => $email
        ];

        $user->update($updates);

        $data = [
            'success' => 'USER DETAILS SUCCESSFULLY UPDATED'
        ];

        return redirect()->back()->with($data);
    }

    public function create() {
        return view('users/create');
    }

    public function store(Request $request) {
        // validate each user input
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:50',
            'middlename' => 'string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|max:100',
            'username' => 'required|string|max:20',
            'password' => 'required|string',
        ]);
        // if validator denied request then go back to login and send error response
        if($validator->fails()) {
            $errors = $validator->errors()->messages();
            return redirect()->back()->withErrors($errors);
        } else {
            $user = new User(); // initialize new user model
            $user->first_name = $request->firstname;
            $user->middle_name = $request->middlename;
            $user->last_name = $request->lastname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            if($user->save()) { // save the user data and also test if saving successully done
                // if success send success message response
                return redirect()->back()->with(['success' => 'User Successfully saved!' ]);
            } else {
                // if failed to save then send error response
                return redirect()->back()->withErrors('Unable to ceate user. . . .');
            }
        }
    }

}
