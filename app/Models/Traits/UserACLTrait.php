<?php

namespace App\Models\Traits;

use App\User;

trait UserACLTrait
{

    public function permissions()
    {
        $permissions = [];
            $profiles = $this->profile;

             $profiles->permissions;
             $permissions = [];
            foreach($profiles->permissions as $permission )
            {
                 array_push($permissions, $permission->name);
            }

            return $permissions;

    }

/**
 * Verifica se o Usuario tem determinada permissao
 */

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    // public function isTenant(): bool
    // {
    //     return !in_array($this->email, config('acl.admins'));
    // }
}
