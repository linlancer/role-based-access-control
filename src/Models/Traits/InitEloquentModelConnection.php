<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/21
 * Time: 14:32
 */

namespace LinLancer\RBAC\Models\Traits;


trait InitEloquentModelConnection
{
    public function init()
    {
        $manager = new \Illuminate\Database\Capsule\Manager;
        $options = [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'rabc',
            'username'  => 'root',
            'password'  => 'root1234',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'rbac_',
        ];
        $manager->addConnection($options);
        $manager->setAsGlobal();
        $manager->bootEloquent();
    }
}