<?php

namespace App\Policies;

use App\Model\Task;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User $user
     * @param  \App\Model\Task $task
     *
     * @return mixed
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->creator_by_id;
    }
}
