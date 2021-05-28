<?php

namespace App\Http\Controllers;

use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;
    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    function index()
    {
        $users = $this->userService->getAll();

        return view('admin.user.list', compact('users'));
    }

    function create()
    {
        $roles = $this->roleService->getAll();
        return view('admin.user.add', compact('roles'));
    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->store($request);
        return redirect()->route('users.list');
    }

    function edit($id)
    {
        $user = $this->userService->findById($id);
        $roles = $this->roleService->getAll();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->update($id, $request);
        return redirect()->route('users.list');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->delete($id);
        return redirect()->route('users.list');
    }
}
