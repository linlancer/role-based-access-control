<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class RoleAuthModel extends BaseModel
{
    public $table = 'role_auth';

    public $fillable = [
        'role_id',
        'auth_id',
    ];

}