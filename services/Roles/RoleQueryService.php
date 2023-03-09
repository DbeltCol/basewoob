<?php

namespace Service\Roles;

use Interfaces\IRole;

class RoleQueryService
{

    public function execute(int $roleId, IRole $users)
    {
        return $users->execute($roleId);
    }

}
