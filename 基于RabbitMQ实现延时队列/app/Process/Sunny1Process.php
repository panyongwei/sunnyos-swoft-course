<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-10 01:22:54
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Process;


use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;
use Swoft\Task\Task;

/**
 * @Process(name="sunny")
 */
class Sunny1Process implements ProcessInterface
{

    /**
     * @param SwoftProcess $process
     */
    public function run(SwoftProcess $process)
    {
        echo "自定义进程\n";

    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return true;
    }
}
