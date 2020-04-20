<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class AuthModel extends BaseModel
{
    public $table = 'auth';

    const RESOURCE_TYPE = [
        'application' => 1,
        'menu' => 2,
    ];

    public $fillable = [
        'role_id',
        'resource_id',
        'resource_type',
    ];

}