<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;


class MenuNodeModel extends BaseModel
{
    public $table = 'menu_node';

    public $fillable = [
        'node_name',
        'node_path',
        'parent_node',
        'level',
    ];

}