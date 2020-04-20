<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class GroupRoleModel extends BaseModel
{
    public $table = 'group_role';

    public $fillable = [
        'group_id',
        'role_id',
    ];

}