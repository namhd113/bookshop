<?php


namespace App\Http\Services;


use App\Http\Repositories\PermissionRepository;
use App\Models\Permission;

class PermissionService
{
    protected $permissionRepo;
    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepo =$permissionRepo;
    }

    function getAll()
    {
        return $this->permissionRepo->getAll();
    }

    function getPermissionsParent()
    {
        return $this->permissionRepo->getPermissionsParent();
    }

    function findById($id)
    {
        return $this->permissionRepo->findById($id);
    }

    function store($request)
    {
    }

    function update($id, $request)
    {
        $permission = $this->permissionRepo->findById($id);
        $permission->fill($request->all());
        $permission->parent_id = $request->parent_id;
        $this->permissionRepo->update($permission);
    }

    function delete($id)
    {
        $permission = $this->permissionRepo->findById($id);
        $this->permissionRepo->delete($permission);
    }
}
