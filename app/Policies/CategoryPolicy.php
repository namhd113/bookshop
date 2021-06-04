<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_category');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_category');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_category');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_category');
    }


    public function restore(User $user, Category $category)
    {
        //
    }


    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
