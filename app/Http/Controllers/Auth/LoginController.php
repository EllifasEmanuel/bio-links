<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponseAlias
    {
        if ($request->attempt()) {
            return to_route('dashboard');
        }

        return back()->with(['message' => 'Não encontrado']);
    }
}
