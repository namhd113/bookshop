<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_author');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_author');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_author');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_author');
    }


    public function restore(User $user, Author $author)
    {
        //
    }


    public function forceDelete(User $user, Author $author)
    {
        //
    }
}
