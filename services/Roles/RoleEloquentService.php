<?php namespace Service\Roles;

use App\Models\Role;
use Interfaces\IRole;

class RoleEloquentService implements IRole
{
    public function execute(int $roleId)
    {
        return Role::with([
            'permissions' => function($q)
            {
                return $q->select('permissions.id','permissions.name');
            }
        ])->where('id', $roleId)->first();
    }

}
