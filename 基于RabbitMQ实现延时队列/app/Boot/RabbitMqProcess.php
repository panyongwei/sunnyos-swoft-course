<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-10 02:38:49
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Boot;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;

/**
 * @Process(boot=true)
 */
class RabbitMqProcess implements ProcessInterface
{

    /**
     * @param SwoftProcess $process
     * @throws \ErrorException
     */
    public function run(SwoftProcess $process)
    {
        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();
        $channel->queue_declare("sunny",false,false,false,false);
        $callback = function($msg) use ($channel){
            $channel->queue_delete($msg->delivery_info["routing_key"]);
            echo "接收时间:".time()."接收到数据：".$msg->body."\n";
        };

        $channel->basic_consume("sunny","",false,true,false,false,$callback);
        while(count($channel->callbacks)){
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return true;
    }
}
