<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models\Traits;

use LinLancer\RBAC\Models\GroupRoleModel;
use LinLancer\RBAC\Models\RoleModel;

trait GroupModelTrait
{
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, GroupRoleModel::fullTable(), 'group_id', 'role_id');
    }

    public function setUsersToGroup()
    {

    }

    public function unsetUserFromGroup()
    {

    }

}