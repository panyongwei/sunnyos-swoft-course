<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-10 01:44:39
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Boot;


use Swoft\App;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;
use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoole\Timer;

/**
 * @Process(boot=false)
 */
class RedisProcess implements ProcessInterface
{

    /**
     * @param SwoftProcess $process
     */
    public function run(SwoftProcess $process)
    {
        echo "redis进程启动\n";
        Timer::tick(10, function () {
            /** @var Redis $redis */
            $redis = App::getBean(Redis::class);
            $res = $redis->lPop("message");
            if ($res){
                Task::deliverByProcess("sunny","async1",[$res]);
                //echo $res."\n";
            }
        });
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return true;
    }
}
