<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class RoleModel extends BaseModel
{
    public $table = 'role';

    public $fillable = [
        'role_name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(UserModel::class, UserRoleModel::fullTable(), 'user_id', 'role_id');
    }

    public function groups()
    {
        return $this->belongsToMany(GroupModel::class, GroupRoleModel::fullTable(), 'group_id', 'role_id');
    }

    public function resources()
    {
        return $this->belongsToMany(AuthModel::class, RoleAuthModel::fullTable(), 'resource_id', 'role_id');
    }
}