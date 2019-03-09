<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-10 01:20:55
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Boot;


use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;
use Swoft\Task\Task;

/**
 * @Process(boot=false,num=10)
 */
class SunnyProcess implements ProcessInterface
{

    /**
     * @param SwoftProcess $process
     */
    public function run(SwoftProcess $process)
    {
        Task::deliverByProcess("sunny","async",[1,2]);
        echo "前置进程\n";
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return true;
    }
}
