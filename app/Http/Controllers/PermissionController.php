<?php

namespace App\Http\Controllers;

use App\Http\Services\PermissionService;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    function index()
    {
        $permissions = $this->permissionService->getAll();
        return view('admin.permissions.list', compact('permissions'));
    }

    function create()
    {
        return view('admin.permissions.add');
    }

    function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $permissionParent = new Permission();
            $permissionParent->name = $request->name_parent;
            $permissionParent->des = $request->name_parent;
            $permissionParent->parent_id = 0;
            $permissionParent->save();
            foreach ($request->name_childrent as $value) {
                $permissionChildrent = new Permission();
                $permissionChildrent->name = $value . '_' . $request->name_parent;
                $permissionChildrent->des = $value . ' ' . $request->name_parent;
                $permissionChildrent->parent_id = $permissionParent->id;
                $permissionChildrent->save();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
        return redirect()->route('permissions.list');
    }

    function edit($id)
    {
        $permission = $this->permissionService->findById($id);
        $permissions = $this->permissionService->getPermissionsParent();
        return view('admin.permissions.edit', compact( 'permissions', 'permission'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->update($id, $request);
        return redirect()->route('permissions.list');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->delete($id);
        return redirect()->route('permissions.list');
    }
}
