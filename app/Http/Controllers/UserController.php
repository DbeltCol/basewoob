<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRolResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Service\Users\UserEloquentService;
use Service\Users\UserQueryService;
use Service\Users\UserSqlService;

class UserController extends Controller
{

    private UserQueryService $userQueryService;

    public function __construct(UserQueryService $userQueryService)
    {
        $this->userQueryService = $userQueryService;
    }

    public function getUserByRoles()
    {
        //roles should come from a request http
        $roles = [1,2];

        //using query builder
        return $this->userQueryService->execute($roles, new UserSqlService);

        //using eloquent orm
       /*  return $this->userQueryService->execute($roles, new UserEloquentService); */
    }

    public function getRoleByPermissions()
    {
        $permission = 2;

        return UserRolResource::collection($this->userQueryService->userWithSpecificPermission($permission, new UserEloquentService));
    }

    public function updateLastLogin(Request $request)
    {
        auth()->user()->update(['last_login' => Carbon::now()]);

        return redirect('dashboard');

    }
}
