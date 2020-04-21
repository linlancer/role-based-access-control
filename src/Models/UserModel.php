<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;

use LinLancer\RBAC\Models\Traits\UserModelTrait;

class UserModel extends BaseModel
{
    use UserModelTrait;

    public $table = 'user';

    public $fillable = [
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, UserRoleModel::fullTable(), 'user_id', 'role_id');
    }
}