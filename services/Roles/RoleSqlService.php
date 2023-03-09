<?php namespace Service\Users;

use Illuminate\Support\Facades\DB;
use Interfaces\IRole;


class RoleSqlService implements IRole
{
    public function execute(int $roleId)
    {
     /*    return DB::table('roles')
        ->join('permissions')
        ->where('id', $roleId)->first(); */
    }
}
