<?php

namespace App\Http\Controllers;

use App\Http\Services\PermissionService;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    protected $permissionService;
    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;

    }

    function index()
    {
        $roles = $this->roleService->getAll();
        return view('admin.roles.list', compact('roles'));
    }

    function create()
    {
        $permissions = $this->permissionService->getAll();
        return view('admin.roles.add', compact('permissions'));
    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->roleService->store($request);
        return redirect()->route('roles.list');
    }

    function edit($id)
    {
        $role = $this->roleService->findById($id);
        $permissions = $this->permissionService->getPermissionsParent();
        return view('admin.roles.update', compact('role', 'permissions'));
    }

    function update($id, Request $request)
    {
        $this->roleService->update($id, $request);
        return redirect()->route('roles.list');
    }

    function delete($id)
    {
        $this->roleService->delete($id);
        return redirect()->route('roles.list');
    }
}
