<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-03 15:35:08
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Controllers;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;

/**
 * @Controller()
 */
class SunnyController
{
    /**
     * @RequestMapping(route="/sunny/{id}")
     */
    public function sunny(int $id)
    {
        /*$connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();
        $channel->queue_declare("sunny",false,false,false,false);
        $msg = new AMQPMessage("Sunny:".time());
        $channel->basic_publish($msg,'',"sunny");
        $channel->close();
        $connection->close();*/

        /*$table = new AMQPTable();
        $table->set("x-message-ttl",5000);
        $table->set("x-dead-letter-exchange","delay.5s.topic");

        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();
        $channel->queue_declare("delay.5s.sunny",false,true,false,false,false,$table);
        $msg = new AMQPMessage("Sunny:".time());
        $channel->basic_publish($msg,'',"delay.5s.sunny");
        $channel->close();
        $connection->close();*/

        $connection = new AMQPStreamConnection("localhost",5672,"guest","guest");
        $channel = $connection->channel();

        // 创建交换机
        $exchange = "delay.sunny.topic";
        $channel->exchange_declare($exchange,"fanout",false,true,false);
        $channel->queue_bind("sunny",$exchange);


        // 创建队列
        $num = $id;
        $queue = "delay.{$num}s.topic";
        $table = new AMQPTable();
        $table->set("x-message-ttl",intval($num.'000'));
        $table->set("x-dead-letter-exchange",$exchange);


        $channel->queue_declare($queue,false,true,false,false,false,$table);
        $msg = new AMQPMessage("Sunny:".time());
        $channel->basic_publish($msg,'',$queue);
        $channel->close();
        $connection->close();
    }
}
