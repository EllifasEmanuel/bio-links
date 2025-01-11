<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LinkController extends Controller
{
    public function create(): View
    {
        return view('links.create');
    }

    public function store(StoreLinkRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $user->links()
            ->create(
                $request->validated()
            );

        return to_route('dashboard');
    }

    public function edit(Link $link): View
    {
        return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link): RedirectResponse
    {
        $link->fill($request->validated())
            ->save();

        return to_route('dashboard')
            ->with('message', 'Alterado com sucesso!');
    }

    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return to_route('dashboard')
            ->with('message', 'Deletado com sucesso!');
    }

    public function up(Link $link): RedirectResponse
    {
        $link->moveUp();

        return back();
    }

    public function down(Link $link): RedirectResponse
    {
        $link->moveDown();

        return back();
    }
}
