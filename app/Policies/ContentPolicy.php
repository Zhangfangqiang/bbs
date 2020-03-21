<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Content;
use App\Models\UserHasContent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * 用户点赞内容
     * @param User $originalUser
     * @param User $targetUser
     */
    public function awesome(User $originalUser, Content $content)
    {
        #没有自己操作自己的内容
        if ($originalUser->id === $content->user_id) {
            return false;
        }

        return !(UserHasContent::where('user_id', $originalUser->id)->where('content_id', $content->id)->count() > 0);
    }

    /**
     * 用户取消点赞内容
     * @param User $originalUser
     * @param Content $content
     * @return bool
     */
    public function cancelAwesome(User $originalUser, Content $content)
    {
        #没有自己操作自己的内容
        if ($originalUser->id === $content->user_id) {
            return false;
        }

        return (UserHasContent::where('user_id', $originalUser->id)->where('content_id', $content->id)->count() > 0);
    }
}
