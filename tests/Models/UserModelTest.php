<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/21
 * Time: 11:28
 */

use LinLancer\RBAC\Models\UserModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    use \LinLancer\RBAC\Models\Traits\InitEloquentModelConnection;

    public function testRoles()
    {
        $this->init();
        $model = new UserModel;
        $result = $model->getUserRoles(1);
        $judgement = $result instanceof \Illuminate\Database\Eloquent\Collection;
        $this->assertTrue($judgement);
        $isEmpty = $result->isEmpty();
        $this->assertFalse($isEmpty);
    }
}
