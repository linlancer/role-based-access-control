<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class GroupModel extends BaseModel
{
    public $table = 'group';

    public $fillable = [
        'group_name',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, GroupRoleModel::fullTable(), 'group_id', 'role_id');
    }

}