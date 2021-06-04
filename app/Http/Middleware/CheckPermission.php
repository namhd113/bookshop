<?php

namespace App\Http\Middleware;

use App\Models\Author;
use App\Models\Permission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {

        $listRoleOfUser = User::find(Auth::id())->roles()->select('roles.id')->pluck('id')->toArray();
        $listPermissionOfUser = DB::table('roles')
            ->join('role_permission', 'roles.id','=','role_permission.role_id')
            ->join('permissions','role_permission.permission_id','=','permissions.id')
            ->whereIn('role_id',$listRoleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();
//        dd($listPermissionOfUser);
        $checkPermission = Permission::where('name', $permission)->value('id');
//        dd($listPermissionOfUser);
        if ($listPermissionOfUser->contains($checkPermission)){
            return $next($request);
        }else{
            return abort(403);
        }
    }
}
