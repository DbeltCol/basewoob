<?php namespace Service\Users;

use Illuminate\Support\Facades\DB;
use Interfaces\IUser;

class UserSqlService implements IUser
{
    public function execute(array $roles)
    {
        return DB::table('users')->selectRaw('id, name, surname, role_id')->whereIn('role_id', $roles)->get();
    }

    public function userWithSpecificPermission(int $permission)
    {

    }


}
