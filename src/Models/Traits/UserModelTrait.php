<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use LinLancer\RBAC\Models\GroupModel;
use LinLancer\RBAC\Models\RoleModel;
use LinLancer\RBAC\Models\UserRoleModel;

trait UserModelTrait
{
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, UserRoleModel::fullTable(), 'user_id', 'role_id');
    }

    public function group()
    {
        return $this->belongsTo(GroupModel::class, 'group_id', 'id');
    }

    /**
     * @param $userId
     * @return bool|Collection
     */
    public function getUserRoles($userId)
    {
        $user = $this->handleCondition('id', $userId)->first();
        if (is_null($user))
            return false;
        return $user->roles;
    }

    public function getUserGroupRoles($userId)
    {
        $user = $this->handleCondition('id', $userId)->first();
        if (is_null($user))
            return new Collection();
//        $group = $user->gruop;
        return new Collection();

    }

}