<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\View\View;
=======
use Inertia\Inertia;
use Inertia\Response;
>>>>>>> 910265b (Initial commit after reinitializing Git)

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
<<<<<<< HEAD
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : view('auth.verify-email');
=======
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
>>>>>>> 910265b (Initial commit after reinitializing Git)
    }
}
