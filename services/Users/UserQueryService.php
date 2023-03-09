<?php

namespace Service\Users;

use Interfaces\IUser;

class UserQueryService
{

    public function execute(array $roles, IUser $users)
    {
        return $users->execute($roles);
    }

    public function userWithSpecificPermission(int $permission, IUser $users)
    {
        return $users->userWithSpecificPermission($permission);
    }

}
