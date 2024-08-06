<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    public function access(User $user)
    {
        return $user->email === 'baharradman4748@gmail.com';
    }
}
