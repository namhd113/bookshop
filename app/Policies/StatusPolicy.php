<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_status');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_status');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_status');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_status');
    }


    public function restore(User $user, Status $status)
    {
        //
    }


    public function forceDelete(User $user, Status $status)
    {
        //
    }
}
