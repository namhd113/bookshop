<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_role');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_role');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_role');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_role');
    }


    public function restore(User $user, Role $role)
    {
        //
    }


    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
