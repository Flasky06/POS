<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $requestBody = $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:6', 'max:40'],
        ]);

        // Hash the password
        $requestBody['password'] = bcrypt($requestBody['password']);

        // Create and log in the user
        $user = User::create($requestBody);
        auth()->login($user);

        // Redirect to the homepage or another desired route
        return redirect('/dashboard');
    }

  public function login(Request $request)
    {
        $requestBody = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $requestBody['loginemail'], 'password' => $requestBody['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'message' => 'Invalid credentials. Please try again.'
        ]);
    }
}
