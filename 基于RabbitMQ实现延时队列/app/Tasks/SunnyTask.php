<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-10 01:25:26
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */
namespace App\Tasks;
use Swoft\Task\Bean\Annotation\Task;
/**
 * Class SunnyTask
 * @package App\Tasks
 * @Task("sunny")
 */
class SunnyTask
{
    /**
     * @param $data
     * @param $data1
     * @param $data2
     * @return mixed
     */
    public function co($data, $data1, $data2)
    {
        sleep(10);
        return $data+$data1+$data2;
    }

    /**
     * @param $data
     * @param $data1
     * @return mixed
     */
    public function async($data, $data1)
    {
        echo "SunnyTask-async1\n";
        return $data+$data1;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function async1($data)
    {
        echo "Task:".$data."\n";
    }

}
