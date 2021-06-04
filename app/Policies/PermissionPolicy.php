<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_permission');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_permission');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_permission');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_permission');
    }


    public function restore(User $user, Permission $permission)
    {
        //
    }


    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
