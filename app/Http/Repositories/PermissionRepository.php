<?php


namespace App\Http\Repositories;


use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    function getAll()
    {
        return Permission::paginate(5);
    }

    function getPermissionsParent()
    {
//        return Permission::where('parent_id',0)->get();
        return Permission::all();
    }

    function findById($id)
    {
        return Permission::findOrFail($id);
    }

    function getInstance(): Permission
    {
        return new Permission();
    }

    function store($permission)
    {
        $permission->save();
    }

    function update($permission)
    {
        $permission->update();
    }


    function delete($permission)
    {
        DB::beginTransaction();
        try {
            $permission->roles()->detach();
            $permission->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

}
