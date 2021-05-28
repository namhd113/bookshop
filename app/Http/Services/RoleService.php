<?php


namespace App\Http\Services;


use App\Http\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepo;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepo = $roleRepository;
    }

    function getAll()
    {
        return $this->roleRepo->getAll();
    }

    function findById($id)
    {
        return $this->roleRepo->findById($id);
    }

    function store($request)
    {
        $role = $this->roleRepo->getInstance();
        $role->fill($request->all());
        $permissionId = $request->permission_id;
        $this->roleRepo->store($role, $permissionId);

    }

    function update($id, $request)
    {
        $role = $this->roleRepo->findById($id);
        $role->fill($request->all());
        $permissionId = $request->permission_id;
        $this->roleRepo->store($role, $permissionId);
    }

    function delete($id)
    {
        $role = $this->roleRepo->findById($id);
        $this->roleRepo->delete($role);
    }
}
