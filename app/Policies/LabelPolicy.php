<?php

namespace App\Policies;

use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    public function actionWithLabels(User $user): bool
    {
        return $user->isAdmin();
    }
}
