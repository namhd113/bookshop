<?php
namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;



class UserService
{
    protected $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    function getAll()
    {
        return $this->userRepo->getAll();
    }

    function findById($id)
    {
        return $this->userRepo->findById($id);
    }

    function store($request)
    {
        $user = $this->userRepo->getInstance();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $roles = $request->role_id;
        $this->userRepo->store($user, $roles);
    }

    function update($id, $request)
    {
        $user = $this->userRepo->findById($id);
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $roles = $request->role_id;
        $this->userRepo->update($user, $roles);
    }

    function delete($id)
    {
        $user = $this->userRepo->findById($id);
        $this->userRepo->delete($user);
    }
}