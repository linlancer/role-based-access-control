<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/17
 * Time: 18:30
 */

interface BaseCurdInterface
{
    public function create(array $data);

    public function upsert(array $data, array $where);

    public function read();

    public function drop();
}