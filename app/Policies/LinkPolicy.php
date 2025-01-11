<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    public function linkBelongsToUserLogged(User $user, Link $link): Response
    {
        return $link->user->is($user)
            ? Response::allow()
            : Response::deny('You do not own this link.');
    }
}
