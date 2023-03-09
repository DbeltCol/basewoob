<?php namespace Service\Users;

use App\Models\User;
use Interfaces\IUser;

class UserEloquentService implements IUser
{
    public function execute(array $roles)
    {
        return User::whereIn('role_id',$roles)->get(['id','name','surname','role_id']);
    }

    public function userWithSpecificPermission(int $permission)
    {

        return User::whereHas('role',function($q) use($permission){
                $q->whereHas('permissions',function($q) use($permission){
                    $q->where('permissions.id',$permission);
                });
            })->get();


       /*  return User::whereHas('role',function($q) use($permission){
            $q->whereHas('permissions', function($q) use($permission)
            {
                $q->select()->where('permissions.id', $permission);
            });
        })->get(); */
    }
}
