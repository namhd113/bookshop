<?php


namespace App\Http\Repositories;


use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleRepository
{
    function getAll()
    {
        return Role::all();
    }

    function findById($id)
    {
        return Role::findOrFail($id);
    }

    function getInstance(): Role
    {
        return new Role();
    }
    function store($role, $permissionId)
    {
        DB::beginTransaction();
        try {
            $role->save();
            $role->permissions()->sync($permissionId);
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    function update($role, $permissionId)
    {
        DB::beginTransaction();
        try {
            $role->update();
            $role->permissions()->sync($permissionId);
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    function delete($role)
    {
        DB::beginTransaction();
        try {
            $role->permissions()->detach();
            $role->delete();
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
