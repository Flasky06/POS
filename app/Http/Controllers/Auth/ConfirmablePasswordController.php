<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
<<<<<<< HEAD
use Illuminate\View\View;
=======
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 910265b (Initial commit after reinitializing Git)

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
<<<<<<< HEAD
    public function show(): View
    {
        return view('auth.confirm-password');
=======
    public function show(): Response
    {
        return Inertia::render('Auth/ConfirmPassword');
>>>>>>> 910265b (Initial commit after reinitializing Git)
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
