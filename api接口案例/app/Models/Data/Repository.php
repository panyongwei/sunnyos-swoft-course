<?php
/**
 * +----------------------------------------------------------------------
 * | 缓存
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-28 00:14:10
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Models\Data;


use Swoft\Bean\Annotation\Inject;
use Swoft\Redis\Redis;

class Repository
{
    protected $ttl = 10;

    protected $model;
    protected $tag;

    /**
     * @Inject()
     * @var Redis
     */
    protected $redis;

    public function getTtl()
    {
        return $this->ttl;
    }

    public function setTtl($time)
    {
        $this->ttl = $time;
        return $this;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function findById($id)
    {
        return $this->remeber($this->getTag() . ":" . $id, function () use ($id) {
            return $this->getModel()::findById($id)->getResult();
        });
    }

    public function remeber($key,\Closure $entity)
    {
        $value = $this->redis->get($key);
        if (empty($value)) {
            $value = $entity();
            if (!empty($value)) {
                $this->redis->set($key, $value, $this->getTtl());
            }
        }
        return $value;
    }
}
