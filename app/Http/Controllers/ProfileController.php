<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $data = $request->validated();

        if ($file = $request->photo) {
            $data['photo'] = $file->store('photos');
        }

        $user->fill($data)
            ->save();

        return back()
            ->with('message', 'Perfil atualizado com sucesso!');
    }
}
