<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Service\Roles\RoleEloquentService;
use Service\Roles\RoleQueryService;

class RoleController extends Controller
{
    private RoleQueryService $roleQueryService;

    public function __construct(RoleQueryService $roleQueryService)
    {
        $this->roleQueryService = $roleQueryService;
    }

    public function getById()
    {

        $roleId = 1;

        return $this->roleQueryService->execute($roleId, new RoleEloquentService);
    }
}
