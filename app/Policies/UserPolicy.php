<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * 判断是否拥有
     * @param User $originalUser
     * @param User $targetUser
     * @return bool
     */
    public function user(User $originalUser, User $targetUser)
    {
        return $originalUser->id === $targetUser->id;
    }

}
