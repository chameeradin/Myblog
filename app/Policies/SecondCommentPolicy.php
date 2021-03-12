<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SecondComment;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecondCommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, SecondComment $secondcomment)
    {
        return $user->id === $secondcomment->user_id;
    }
}
