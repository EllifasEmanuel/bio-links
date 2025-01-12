<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BioLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): View
    {
        return view('bio-links', compact('user'));
    }
}
