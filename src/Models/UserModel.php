<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class UserModel extends BaseModel
{
    public $table = 'user';

    public $fillable = [
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, UserRoleModel::fullTable(), 'user_id', 'role_id');
    }
}