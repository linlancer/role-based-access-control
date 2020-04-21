<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/4/20
 * Time: 9:12
 */

namespace LinLancer\RBAC\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model implements BaseCurdInterface
{
    public $connection = 'default';

    const DATE_FORMAT = 'Y-m-d H:i:s';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

    public function read()
    {
        return $this->get();
    }

    public function create(array $data)
    {
        return $this->forwardCallTo($this->newQuery(), 'create', $data);
    }

    public function upsert(array $data, array $where)
    {
        $find = $this->handleCondition($where)->first();
        if (!is_null($find))
            return $find->update($data);
        return false;
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function drop()
    {
        return $this->delete();
    }

    /**
     * 获取表名
     * @param bool $withPrefix
     * @return string
     */
    public static function fullTable($withPrefix = false)
    {
        $static = new static;
        return $withPrefix
            ? $static->getConnection()->getTablePrefix() . $static->getTable()
            : $static->getTable();
    }

    /**
     * 兼容旧版搜索条件的条件处理
     * @param        $column
     * @param null   $operator
     * @param null   $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     */
    public function handleCondition($column, $operator = null, $value = null, $boolean = 'and')
    {
        if ($operator instanceof Builder) {
            $builder = $operator;
            $query = $operator->getQuery();
        } else {
            $builder = $this->newQuery();
            $query = $builder->getQuery();
        }

        if (is_array($column)) {
            foreach ($column as $k => $item) {
                //如果不是数组先包裹成数组
                !is_array($item) && $item = [$item];
                //兼容tp  where【列名】 = 【操作符，【条件】】 的旧格式
                if (is_string($k) && !is_numeric($k)) {
                    array_unshift($item, $k);
                }
                if (count($item) >= 3 && !in_array($item[1], $query->operators)) {
                    switch (strtolower($item[1])) {
                        case 'between':
                            unset($item[1]);
                            $item = array_values($item);
                            $query->whereBetween(...$item);
                            break;
                        case 'in':
                            unset($item[1]);
                            $item = array_values($item);
                            $query->whereIn(...$item);
                            break;
                        default:
                            break;
                    }
                } else {
                    $query->where(...$item);
                }
            }
        } else {
            if (func_num_args() >= 3 && !in_array($operator, $query->operators)) {
                switch (strtolower($operator)) {
                    case 'between':
                        $query->whereBetween(...func_get_args());
                        break;
                    case 'in':
                        $query->whereIn(...func_get_args());
                        break;
                    default:
                        break;
                }
            } else {
                $query->where(...func_get_args());
            }
        }
        return $builder;

    }

}