<?php

namespace App\Policies;

use App\Model\Task;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function delete(User $user): bool
    {
        return $user->id === \Auth::user()->id;
    }

    public function update(User $user): bool
    {
        return $user->id === \Auth::user()->id || $user->isAdmin();
    }
}
