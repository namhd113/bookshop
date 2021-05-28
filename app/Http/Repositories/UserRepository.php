<?php
namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    function getAll()
    {
        return User::all();
    }

    function getInstance(): User
    {
        return new User();
    }

    function findById($id)
    {
        return User::findOrFail($id);
    }

    function store($user, $roles)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($roles);
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    function update($user, $roles)
    {
        DB::beginTransaction();
        try {
            $user->update();
            $user->roles()->sync($roles);
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    function delete($user)
    {
        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}