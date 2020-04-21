<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


use LinLancer\RBAC\Models\Traits\GroupModelTrait;

class GroupModel extends BaseModel
{
    use GroupModelTrait;

    public $table = 'group';

    public $fillable = [
        'group_name',
        'description',
    ];

}