<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(): RedirectResponseAlias
    {
        $user = User::query()
            ->where('email', '=', request()->email)
            ->first();

        if ($user && Hash::check(request()->password, $user->password)) {
            auth()->login($user);

            return to_route('dashboard');
        }

        return back()->with(['message' => 'Invalid credentials']);
    }
}
