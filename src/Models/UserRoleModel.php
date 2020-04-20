<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class UserRoleModel extends BaseModel
{
    public $table = 'user_role';

    public $fillable = [
        'role_id',
        'user_id',
    ];

}