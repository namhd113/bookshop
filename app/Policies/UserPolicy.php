<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        return $user->checkPermissionUser('list_user');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_user');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_user');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_user');
    }


    public function restore(User $user, User $model)
    {
        //
    }


    public function forceDelete(User $user, User $model)
    {
        //
    }
}
