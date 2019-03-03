<?php
/**
 * +----------------------------------------------------------------------
 * |
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-03-03 12:45:51
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Controllers;

use App\Models\Entity\Good;
use App\Models\Entity\Order;
use Swoft\Bean\Annotation\Inject;
use Swoft\Db\Db;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Redis\Redis;

/**
 * @Controller(prefix="/v1/seckill")
 */
class SeckillController
{
    /**
     * @Inject()
     * @var Redis
     */
    private $redis;

    /**
     * @RequestMapping(route="good")
     */
    public function good()
    {
        /** @var Good $good */
        /*$good = Good::findById(1)->getResult();
        $stock = $good->getStock();
        if ($stock > 0) {
            Good::updateOne(['stock'=>$stock-1],['id'=>1])->getResult();

            $order = new Order();
            $order->setGood(1);
            $order->save()->getResult();
            return "success\n";
        }else{
            return "error\n";
        }*/
        /*$count = $this->redis->lLen("good");
        if ($count > 0) {
            $goodId = $this->redis->rPop("good");
            $good = Good::findById(1)->getResult();
            $stock = $good->getStock();

            Good::updateOne(['stock' => $stock - 1], ['id' => 1])->getResult();

            $order = new Order();
            $order->setGood(1);
            $order->save()->getResult();
            return "success\n";
        } else {
            return "error\n";
        }*/

        $goodId = $this->redis->rPop("good");
        if ($goodId > 0) {
            $good = Good::findById(1)->getResult();
            $stock = $good->getStock();

            //Good::updateOne(['stock' => $stock - 1], ['id' => 1])->getResult();
            Db::query("update sunny_good set stock=stock-1 where id=?",[1])->getResult();

            $order = new Order();
            $order->setGood(1);
            $order->save()->getResult();
            return "success\n";
        } else {
            return "error\n";
        }
    }

    /**
     * @RequestMapping(route="start")
     * @return string
     */
    public function start()
    {
        $i = 1;
        for ($i; $i <= 10; $i++) {
            $this->redis->rPush("good", 1);
        }
        return $this->redis->lLen("good") . "\n";
    }
}
